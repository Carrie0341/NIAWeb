<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Model\User;
use App\Model\UserInfo;
use App\Model\Alliance;
use Session;
use Cookie;
use Hash;
use Mail;
use App\Mail\Mailer;
use Validator;
use URL;

class AuthController extends Controller
{
    public function __construct()
    {
        // 強制所有由 URL 生成器生成的 URL 使用 HTTPS
        URL::forceScheme('https');
    }

    /* 登入表單 */
    public function formOfLogin()
    {
        return view('login');
    }

    /* 登入驗證 */
    public function submitOfLogin(Request $request)
    {
        $user = User::where('email', $request->account)->orWhere('account', $request->account)->first();

        if ($user != null && Hash::check($request->Password, $user->password)) {

            if ($user->email_verified_at == null) {
                $response = [
                    "state" => false,
                    "message" => "用戶同意審查中",
                ];
            } else {
                $remember_token = str_random(40);
                $user->remember_token = $remember_token;
                $user->save();
                $response = [
                    "state" => true,
                    "message" => "登入成功",
                ];
                session()->put('user', $remember_token);

                // check user is Company
                if ($user->user_info->type == 2) {
                    session()->put('isCompany', $remember_token);
                }
            }

            if (isset($request->keep)) {
                Cookie::forever('account', $request->account);
                Cookie::forever('password', $request->Password);
            }
        } else {
            $response = [
                "state" => false,
                "message" => "帳號或密碼錯誤",
            ];
        }

        return response()->json($response);
    }

    /* 忘記密碼表單 */
    public function submitOfpswdForget(Request $request)
    {
        $user = User::where('email', $request->contactEmail)->first();

        if ($user == null) {
            $response = [
                "state" => false,
                "message" => "不存在的信箱",
            ];
        } else {
            $nextPassword = str_random(18);
            $user->password = Hash::make($nextPassword);
            $user->save();
            $this->sendNewPassword($user->email, $nextPassword);

            $response = [
                "state" => true,
                "message" => "驗證成功",
            ];
        }

        return response()->json($response);
    }

    /* 登出 */
    public function logout()
    {
        Session::forget('user');
        Session::forget('isCompany');
        return redirect()->to('/');
    }

    /* 註冊表單 */
    public function formOfRegister()
    {
        // 如果是 HTTP 請求，重定向到 HTTPS
        if (!request()->secure() && app()->environment('production')) {
            return redirect()->secure(request()->getRequestUri());
        }

        $alliances = Alliance::all();
        return view('auth.register')->with([
            'alliances' => $alliances,
            'secureRegisterUrl' => secure_url('register') // 添加安全的註冊URL
        ]);
    }

    /* 提交註冊 */
    public function submitOfRegister(Request $request)
    {
        // 記錄請求信息到日誌
        \Log::info('表單提交開始', ['request' => $request->all(), 'is_secure' => $request->secure()]);

        // 檢查是否為AJAX請求
        $isAjax = $request->ajax() || $request->wantsJson() || $request->header('X-Requested-With') === 'XMLHttpRequest';

        // 從表單類型欄位或提交按鈕名稱確定表單類型
        $formType = $request->formType ?? ($request->has('teacher') ? 'teacher' : ($request->has('company') ? 'company' : null));

        \Log::info('表單類型: ' . $formType);

        // 處理教師表單
        if ($formType === 'teacher') {
            // 設置 teacher 參數，以便後續代碼能夠識別
            $request->merge(['teacher' => true]);

            $validator = Validator::make($request->all(), [
                "name" => "required",
                "phone" => "required",
                "T_contactEmail" => "required|email"
            ]);

            if ($validator->fails()) {
                \Log::warning('表單驗證失敗', $validator->errors()->toArray());

                if ($isAjax) {
                    return response()->json([
                        'success' => false,
                        'errors' => $validator->errors()
                    ]);
                }

                return Redirect::back()->withErrors($validator->errors())->withInput()->with("feedback", "Teacher");
            } else {
                try {
                    // 準備郵件內容
                    $emailData = [
                        "type" => "教師",
                        "name" => $request->name,
                        "phone" => $request->phone,
                        "email" => $request->T_contactEmail,
                        "department" => $request->department ?? '未提供',
                        "jobTitle" => $request->jobTitle ?? '未提供',
                        "message" => $request->message ?? '無',
                        "submitTime" => now()->format('Y-m-d H:i:s')
                    ];

                    \Log::info('準備發送教師郵件', $emailData);

                    // 發送郵件
                    Mail::to('asdqweqa@go.edu.tw')->send(new Mailer("智能運動科技應用技術聯盟-聯絡表單內容(教師)", "mails.contactForm", $emailData));
                    Mail::to('typan@mail.ntust.edu.tw')->send(new Mailer("智能運動科技應用技術聯盟-聯絡表單內容(教師)", "mails.contactForm", $emailData));

                    \Log::info('教師郵件已發送');

                    if ($isAjax) {
                        return response()->json([
                            'success' => true,
                            'message' => '恭喜您完成申請，服務專員會再主動與您電話連絡，確認申請資料'
                        ]);
                    }

                    return Redirect::to(secure_url('register'))->with('success', '恭喜您完成申請，服務專員會再主動與您電話連絡，確認申請資料');
                } catch (\Exception $e) {
                    \Log::error('郵件發送失敗: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);

                    if ($isAjax) {
                        return response()->json([
                            'success' => false,
                            'message' => '申請提交失敗，請稍後再試或直接聯繫我們。錯誤: ' . $e->getMessage()
                        ]);
                    }

                    return Redirect::back()->withInput()->with('error', '申請提交失敗，請稍後再試或直接聯繫我們。錯誤: ' . $e->getMessage());
                }
            }
        }

        // 處理企業表單
        if ($formType === 'company') {
            // 設置 company 參數，以便後續代碼能夠識別
            $request->merge(['company' => true]);

            $validator = Validator::make($request->all(), [
                "name" => "required",
                "phone" => "required",
                "C_contactEmail" => "required|email"
            ]);

            if ($validator->fails()) {
                \Log::warning('表單驗證失敗', $validator->errors()->toArray());

                if ($isAjax) {
                    return response()->json([
                        'success' => false,
                        'errors' => $validator->errors()
                    ]);
                }

                return Redirect::back()->withErrors($validator->errors())->withInput()->with("feedback", "Company");
            } else {
                try {
                    // 準備郵件內容
                    $emailData = [
                        "type" => "企業",
                        "name" => $request->name,
                        "phone" => $request->phone,
                        "email" => $request->C_contactEmail,
                        "companyName" => $request->companyName ?? '未提供',
                        "jobTitle" => $request->jobTitle ?? '未提供',
                        "message" => $request->message ?? '無',
                        "submitTime" => now()->format('Y-m-d H:i:s')
                    ];

                    // 如果有勾選設定項目，也加入郵件內容
                    if (isset($request->setting)) {
                        $alliances = Alliance::whereIn('id', $request->setting)->pluck('name')->toArray();
                        $emailData['settings'] = $alliances;
                    }

                    \Log::info('準備發送企業郵件', $emailData);

                    // 發送郵件
                    Mail::to('asdqweqa@go.edu.tw')->send(new Mailer("智能運動科技應用技術聯盟-聯絡表單內容(企業)", "mails.contactForm", $emailData));
                    Mail::to('typan@mail.ntust.edu.tw')->send(new Mailer("智能運動科技應用技術聯盟-聯絡表單內容(企業)", "mails.contactForm", $emailData));

                    \Log::info('企業郵件已發送');

                    if ($isAjax) {
                        return response()->json([
                            'success' => true,
                            'message' => '恭喜您完成申請，服務專員會再主動與您電話連絡，確認申請資料'
                        ]);
                    }

                    return Redirect::to(secure_url('register'))->with('success', '恭喜您完成申請，服務專員會再主動與您電話連絡，確認申請資料');
                } catch (\Exception $e) {
                    \Log::error('郵件發送失敗: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);

                    if ($isAjax) {
                        return response()->json([
                            'success' => false,
                            'message' => '申請提交失敗，請稍後再試或直接聯繫我們。錯誤: ' . $e->getMessage()
                        ]);
                    }

                    return Redirect::back()->withInput()->with('error', '申請提交失敗，請稍後再試或直接聯繫我們。錯誤: ' . $e->getMessage());
                }
            }
        }

        // 如果沒有識別到表單類型，嘗試根據提交的數據判斷
        if ($request->has('T_contactEmail') && !empty($request->T_contactEmail)) {
            // 如果有填寫教師郵箱，視為教師表單
            return $this->submitOfRegister($request->merge(['formType' => 'teacher']));
        } elseif ($request->has('C_contactEmail') && !empty($request->C_contactEmail)) {
            // 如果有填寫企業郵箱，視為企業表單
            return $this->submitOfRegister($request->merge(['formType' => 'company']));
        }

        // 如果仍然無法識別表單類型
        \Log::warning('未知的表單提交類型');

        if ($isAjax) {
            return response()->json([
                'success' => false,
                'message' => '未知的表單提交類型，請確保選擇了正確的表單類型（教師或企業）'
            ]);
        }

        return Redirect::back()->with('error', '未知的表單提交類型，請確保選擇了正確的表單類型（教師或企業）');
    }

    /* 編輯個資表單 */
    public function editView($token)
    {
        $user = User::where('remember_token', $token)->with('user_info')->first();
        return view('edit')->with(['user' => $user, 'info' => $user->user_info]);
    }

    /* 提交個人資料 */
    public function editData(Request $request, $token)
    {
        $user = User::where('remember_token', $token)->with('user_info')->first();
        $info = $user->user_info;

        if ($user->email != $request->contactEmail && User::where('email', $request->contactEmail)->first() != null) {
            return redirect()->back()->withErrors(["email" => "TEST"])->withInput();
        }

        $user->phone = $request->phone;
        $user->email = $request->contactEmail;
        if ($request->isChange)
            $user->password = Hash::make($request->password);

        $info->jobTitle = $request->jobTitle;
        $info->department = isset($request->department) ? $request->department : $info->department;
        $user->save();
        $info->save();

        return redirect()->to(secure_url('edit/' . $user->remember_token));
    }

    private function sendNewPassword($mailAddress, $newPassword)
    {
        $to = collect([
            'Receiver' => $mailAddress,
        ]);

        $params = [
            "Receiver" => $mailAddress,
            "password" => $newPassword
        ];

        Mail::to($to)->send(new Mailer("密碼重設通知", "mails.passwordReset", $params));
    }
    // TODO
    public function editOfMember() {}

    public function updateOfMember() {}

    public function deleteOfMember() {}
}

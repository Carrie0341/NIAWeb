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

class AuthController extends Controller
{
    /* 登入表單 */
    public function formOfLogin()
    {
        return view('login');
    }

    /* 登入驗證 */
    public function submitOfLogin(Request $request)
    {
        $user = User::where('email', $request->account)->orWhere('account', $request->account)->first();

        if ($user != null && Hash::check($request->Password, $user->password) ) {
            
            if( $user->email_verified_at == null )
            {
                $response = [
                    "state" => false,
                    "message" => "用戶同意審查中",
                ];
            }

            else
            {
                $remember_token = str_random(40);
                $user->remember_token = $remember_token;
                $user->save();
                $response = [
                    "state" => true,
                    "message" => "登入成功",
                ];
                session()->put('user', $remember_token);

                // check user is Company
                if($user->user_info->type == 2) {
                    session()->put('isCompany', $remember_token);
                }
            }
            
            if(isset($request->keep))
            {
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
    
        if ($user == null)
        {
            $response = [
                "state" => false,
                "message" => "不存在的信箱",
            ];
        }

        else
        {
            $nextPassword = str_random(18);
            $user->password = Hash::make($nextPassword);
            $user->save();
            $this->sendNewPassword( $user->email , $nextPassword );

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
        $alliances = Alliance::all();
        return view('auth.register')->with('alliances' , $alliances);
    }

    /* 提交註冊 */
    public function submitOfRegister(Request $request)
    {

        
        if(User::where('email' , $request->T_contactEmail)->exists() || User::where('email' , $request->C_contactEmail)->exists())
        {
            if( isset($request->company) )
                return Redirect::back()->withErrors(["email" => "該信箱已被註冊"])->withInput()->with("feedback", "Company");
            else
                return Redirect::back()->withErrors(["email" => "該信箱已被註冊"])->withInput();
        }

        /* 提交教師表單 */
        if (isset($request->teacher)) {
            $validator = Validator::make($request->all(), [
                "name" => "required",
                "password" => "required|required_with:confirm|same:confirm",
                "confirm" => "required",
            ]);

            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator->errors())->withInput()->with("feedback", "Teacher");
            } else {
                $remember_token = str_random(40);
                $user = new User;

                $user->name = $request->name;
                $user->phone = isset($request->phone) ? $request->phone : "";
                $user->account = $request->account;
                $user->password = Hash::make($request->password);
                $user->email = $request->T_contactEmail;
                $user->remember_token = $remember_token;
                $user->save();


                $info = new UserInfo;
                $info->user_id = $user->id;
                $info->type = 1;
                $info->department = isset($request->department) ? $request->department : "";
                $info->jobTitle = isset($request->jobTitle) ? $request->jobTitle : "";
                $info->save();
                return Redirect::to('/');
            }
        }

        /* 提交企業表單 */
        if (isset($request->company)) {
            $validator = Validator::make($request->all(), [
                "name" => "required",
                "password" => "required|required_with:confirm|same:confirm",
                "confirm" => "required"
            ]);

            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator->errors())->withInput()->with("feedback", "Company");
            } else {
                $remember_token = str_random(40);

                $user = new User;
                $user->name = $request->name;
                $user->phone = isset($request->phone) ? $request->phone : "";
                $user->account = $request->account;
                $user->password = Hash::make($request->password);
                $user->email = $request->C_contactEmail;
                $user->remember_token = $remember_token;
                $user->save();

                $info = new UserInfo;
                $info->user_id = $user->id;
                $info->type = 2;
                $info->department = isset($request->department) ? $request->department : "";
                $info->personal = isset($request->setting) ? json_encode($request->setting) : null;
                $info->jobTitle = isset($request->jobTitle) ? $request->jobTitle : "";
                $info->companyName = isset($request->companyName) ? $request->companyName : "";
                $info->save();

                return Redirect::to('/');
            }
        }
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
        
        if( $user->email != $request->contactEmail && User::where('email' , $request->contactEmail)->first() != null )
        {
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

        return redirect()->to(route('edit', ['token' => $user->remember_token]));
    }

    private function sendNewPassword( $mailAddress , $newPassword )
    {
        
            $to = collect([
                'Receiver' => $mailAddress,
            ]);

            $params = [
                "Receiver" => $mailAddress,
                "password" => $newPassword
            ];
            
            Mail::to($to)->send(new Mailer("密碼重設通知", "mails.passwordReset" , $params));
            
           
    }
    // TODO
    public function editOfMember()
    { }

    public function updateOfMember()
    { }

    public function deleteOfMember()
    { }
}

<?php

namespace App\Http\Controllers;

use App\Model\User;
use App\Model\UserInfo;
use App\Model\UserView;
use App\Model\BusinessRequest;
use App\Model\Alliance;
use Illuminate\Http\Request;

class AdministratorController extends Controller
{

    private $pageRange = 30;

    /* 主頁面 */
    public function index()
    {
        return view('administrator.index');
    }

    /* 用戶一覽 */
    public function userView()
    {
        $data = User::with('user_info')->paginate($this->pageRange);
        return view('administrator.userGroup')->with("users", $data);
    }

    /* 提案一覽 */
    public function requestView()
    {

        $businessRequest = BusinessRequest::orderBy('created_at', 'desc')->paginate(3);
        return view('administrator.requestGroup')->with("requests", $businessRequest)
                                                 ->with("alliances", Alliance::all())
                                                 ->with("allianceID" , -1);
    }

    /* 提案一覽(過濾) */
    public function requestAllianceView( $allianceID ) {
        $businessRequest = BusinessRequest::where('belongTo' , $allianceID)->orderBy('created_at', 'desc')->paginate(1);
        return view('administrator.requestGroup')->with("requests", $businessRequest)
                                                 ->with("alliances", Alliance::all())
                                                 ->with("allianceID" , $allianceID);
    }

     /* 聯盟一覽 */
    public function allianceView()
    {
        $alliances = Alliance::paginate($this->pageRange);
        return view('administrator.allianceGroup')->with("alliances", $alliances);
    }

    /* 拒絕/同意顯示企業需求 */
    public function toggleReq($id)
    {
        $request = BusinessRequest::find($id);
        if($request->accrpt == 0)
        {
            $request->accept = 1;
        }
        else
        {
            $request->accept = 0;
        }
        $request->accept = 0;
        $request->save();
        return redirect()->back();
    }

    /* 同意帳號申請 */
    public function approved($id)
    {
        $now = date("Y-m-d H:i:s");
        $user = User::where("id" , $id)->first();
        $user->email_verified_at = $now;
        $user->save();
        return redirect()->back();
    }

    /* 移除聯盟 */
    public function removeAlliance($id)
    {
        Alliance::find($id)->delete();
        return redirect()->back();
    }

}

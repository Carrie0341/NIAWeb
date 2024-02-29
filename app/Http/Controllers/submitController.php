<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Model\User;
use App\Model\UserInfo;
use App\Model\BusinessRequest;
use App\Model\Alliance;

class submitController extends Controller
{
    public function requestView(Request $request)
    {
        $user = User::where('remember_token' , Session::get('user'))->with('user_info')->first();
        $info = $user->user_info;
        $alliances = "";
        if(  json_decode($info->personal , true) == null)
            $alliances = null;
        else
            $alliances = Alliance::whereIn('id' , json_decode($info->personal , true) )->get(['id','name']); 
        
        return view('request')->with("user" , $user)
                            ->with("info" , $info)
                            ->with("alliances" , $alliances);
    }

    public function request(Request $request)
    {
        //dd( $request->input('input() );
        $businessReuqest = new BusinessRequest;
        $businessReuqest->name = $request->input('name');
        $businessReuqest->phone= $request->input('phone');
        $businessReuqest->company = $request->input('company');
        $businessReuqest->jobTitle = $request->input('jobTitle');
        $businessReuqest->email = $request->input('contactEmail');
        $businessReuqest->request = $request->input('request');
        $businessReuqest->describe = $request->input('describe');
        $businessReuqest->belongTo = $request->input('alliance');
        $businessReuqest->user_id  = $request->input('user_id');
        $businessReuqest->accept = 0;
        $businessReuqest->save();
        return redirect()->back()->with('success' , true);
        
    }

    public function addAlliance(Request $request)
    {
        $alliance = new Alliance;
        $alliance->name = $request->alliance;
        $alliance->save();
        return redirect()->back();

    }

    public function listReq(Request $request) {
        $al = $request->input('alliance');
        if( isset($al) ) {
            $user = User::where('remember_token' , Session::get('user'))->with('user_info')->first();
            $req = BusinessRequest::query();
            $req->select('request', 'describe', 'company');
            $req->where('belongTo' , '=' , $al)->where('accept', '=' , 1);

            //Company only show its own request
            $info = $user->user_info;
            if( isset($info) && $info->type == 2 ) {
                $req->where('user_id', '=', $user->id);
            }

            $req = $req->get();
            $data = [
                'indust_reqs' => $req
            ];
            return view('alliances.indust-request', $data);
        }
        else
        {
            return response('alliance not exist', 500)->header('Content-Type', 'text/plain');
        }

    }
}

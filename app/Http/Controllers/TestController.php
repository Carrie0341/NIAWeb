<?php

namespace App\Http\Controllers;

use App\Model\SysRoute;
use Illuminate\Http\Request;
use App\Model\UserInfo;
use App\Model\Alliance;
use Session;
use Helper;
use Mail;
class TestController extends Controller
{
    public function test()
    {
        $test = json_decode(null);
        dd($test);
    }

    public function clear()
    {
        Session::forget("user");
    }
}

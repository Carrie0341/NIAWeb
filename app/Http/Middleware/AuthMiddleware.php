<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use App\Model\User;
class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $isLogin = Session::has('user');
        $isExistUser = !$isLogin ? false : User::where('remember_token' , Session::get('user'))->exists();
        if( $isLogin && $isExistUser ) 
        {
            return $next($request);
        }
        else
            return redirect()->back()->with('feedback' , 'notLogin');
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use App\Model\User;
use Session;
class Administrator
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
        $adminstrator = User::where('remember_token' , Session::get('user'))->with('user_info')->first();
        if($adminstrator == null || $adminstrator->user_info->type != 3)
        {
            return redirect()->to('/');
        }
        return $next($request);
    }
}

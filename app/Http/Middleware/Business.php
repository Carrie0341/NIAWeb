<?php

namespace App\Http\Middleware;

use Closure;

class Business
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
        $company = UserInfo::where('remember_token' , Session::get('user'))->first();
        if($company == null || $company->type != 2)
        {
            return redirect()->to('/');
        }
        return $next($request);
    }
}

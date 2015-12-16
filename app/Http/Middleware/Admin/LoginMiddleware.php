<?php

namespace App\Http\Middleware\Admin;

use Closure;

class LoginMiddleware
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
    	if(!session()->has('adminname')){
    		return redirect(action('Admin\LogController@login'));
    	}
        return $next($request);
    }
}

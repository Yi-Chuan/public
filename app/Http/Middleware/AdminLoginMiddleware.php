<?php

namespace App\Http\Middleware;

use Closure;

class AdminLoginMiddleware
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
        //判断是否登录 session
        if ($request->session()->has('uid')) {
            //进入下层请求
            return $next($request);
        }else{
            return redirect('/admin/login');
        }
    }
}

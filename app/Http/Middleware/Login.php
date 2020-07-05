<?php

namespace App\Http\Middleware;

use Closure;

class Login
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
        //判断是否登录
        $result=app('session')->get('userInfo');
        //未登录跳转未登录页面
        if (empty($result)) {
            //return   redirect()->route('login');
            return  redirect('login');
        }
        return $next($request);
    }
}

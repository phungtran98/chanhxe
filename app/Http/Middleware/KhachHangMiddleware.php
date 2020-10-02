<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class KhachHangMiddleware
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
        if(Auth::guard('khachhang')->check()){

            return $next($request);
        }
        else
        {
            return redirect()->route('dang-nhap');
        }

    }
}

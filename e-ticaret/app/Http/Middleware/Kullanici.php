<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class Kullanici
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
        if(Auth::guard('kullanici')->check() && Auth::guard('kullanici')->user()->aktifmi)
        {
            return $next($request);
        }
        return redirect()->route('kullanici.loginView');
    }
}

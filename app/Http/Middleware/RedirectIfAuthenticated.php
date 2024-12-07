<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $guard = null)
    {
        // Jika pengguna sudah terautentikasi, redirect ke halaman dashboard
        if (Auth::guard($guard)->check()) {
            return redirect('/'); // Ubah '/' sesuai dengan rute yang ingin Anda tuju
        }

        return $next($request);
    }
}

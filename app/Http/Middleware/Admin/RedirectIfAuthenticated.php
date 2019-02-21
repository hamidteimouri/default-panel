<?php

namespace App\Http\Middleware\Admin;

use Closure;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'admin')
    {
        if (\Auth::guard($guard)->check()) {
            return redirect()->route('admin.home.index')->with('info', 'شما به پنل مدیریت هدایت شدید.');
        }

        return $next($request);
    }
}

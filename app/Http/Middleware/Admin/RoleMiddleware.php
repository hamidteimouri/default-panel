<?php

namespace App\Http\Middleware\Admin;

use Closure;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if (auth()->guard('admin')->guest()) {
            return redirect()->route('admin.auth.login_form');
        }

        $roles = is_array($role)
            ? $role
            : explode('|', $role);

        if (!auth()->guard('admin')->user()->hasAnyRole($roles)) {
            if ($request->ajax()) {
                return response()->json([
                    'msg' => 'اجازه دسترسی برای این عملیات وجود ندارد',
                    'status' => 403,
                ]);
            } else {
                return redirect()->route('admin.home.index')->with('err', 'اجازه دسترسی برای این عملیات وجود ندارد');
            }
        }

        return $next($request);
    }
}

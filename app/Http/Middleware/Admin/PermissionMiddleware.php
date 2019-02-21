<?php

namespace App\Http\Middleware\Admin;

use Closure;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission)
    {
        if (auth()->guard('admin')->guest()) {
            return redirect()->route('admin.auth.login_form');
        }

        $permissions = is_array($permission)
            ? $permission
            : explode('|', $permission);

        foreach ($permissions as $permission) {
            if (auth()->guard('admin')->user()->can($permission)) {
                return $next($request);
            }
        }

        if ($request->ajax()) {
            return response()->json([
                'msg' => 'اجازه دسترسی برای این عملیات وجود ندارد',
                'status' => 403,
            ]);
        } else {
            return redirect()->route('admin.home.index')->with('err', 'نقش مدیریتی شما به این قسمت دسترسی ندارد');
        }
    }
}

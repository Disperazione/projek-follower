<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $admins = array_slice(func_get_args(), 2);

        foreach ($admins as $admin) {
            $role = Auth::user()->role;
            if ($role == $admin) {
                return $next($request);
            }
        }
        return redirect()->route('admin.login');
    }
}

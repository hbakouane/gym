<?php

namespace App\Http\Middleware;

use App\Models\Staff;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class RoleChecker
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
        if (Auth::guard('staff')->check()) {
            $rules = Auth::guard('staff')->user()->role->permissions;
            $route = Route::currentRouteName();
            abort_if(!str_contains($rules, $route), 403, 'You are not authorized to do this action.');
        }
        return $next($request);
    }
}

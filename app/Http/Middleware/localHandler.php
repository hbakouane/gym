<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class localHandler
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
        $locale = null;

        // Check if the user is authenticated, and give him the language he chose before
        if (Auth::check() AND !Session::has('locale')) {
                $user = Auth::guard('staff')->check() ? Auth::guard('staff')->user() : Auth::user();
                $locale = $user->locale;
                Session::put('locale', $locale);
        }

        // Check if the user is requesting language change from a form
        if ($request->has('lang')) {
            $locale = $request->get('lang');
            Session::put('locale', $locale);
        }

        $locale = Session::get('locale');

        if ($locale == null) {
            $locale = config('app.fallback_locale');
        }

        App::setLocale($locale);
        return $next($request);
    }
}

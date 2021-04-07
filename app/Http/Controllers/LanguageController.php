<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public static function change(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::guard('staff')->check() ? Auth::guard('staff')->user() : Auth::user();
            $user->update(['locale' => $request->lang]);
        }
        Session::put('locale', $request->lang);
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers\Auth\Login;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Staff;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaffController extends Controller
{
    protected $redirectTo = '/sa';
    protected $guard = 'staff';

    public function __construct()
    {
        $this->middleware('guest:staff')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.staff');
    }

    public function guard()
    {
        return Auth::guard('staff');
    }

    public function login(Request $request)
    {
        $credentials = ['email' => $request->email, 'password' => $request->password];
        if (Auth::guard('staff')->attempt($credentials, $request->remember)) {
            $staff = Staff::where('email', $credentials['email'])->first();
            $project_id = Project::find($staff->project_id)->project;
            return redirect()->intended(route('home', $project_id));
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}

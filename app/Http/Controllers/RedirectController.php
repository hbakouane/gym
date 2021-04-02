<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectController extends Controller
{
    public function redirect()
    {
        if (Auth::guard('web')->check()) {
            $project = Project::where('user_id', auth()->id())->first()->project;
        }
        if (Auth::guard('staff')->check()) {
            $staff_id = Auth::guard('staff')->id();
            $staff = Staff::find($staff_id);
            $project = Project::find($staff->project_id)->project;
        }
        return redirect(route('user.settings.show', $project));
    }
}

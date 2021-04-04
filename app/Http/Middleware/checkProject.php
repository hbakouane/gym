<?php

namespace App\Http\Middleware;

use App\Models\Project;
use App\Models\Staff;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class checkProject
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
        // This middleware will check if the authenticated owns this project or not
        $project_id = Project::getProjectIdOrFail();
        if (Auth::guard('staff')->check()) {
            $staff_id = Auth::guard('staff')->id();
            $staff = Staff::find($staff_id);
            $project = Project::find($staff->project_id)->project;
        } else {
            $project = Project::where('id', $project_id)
                                ->where('user_id', auth()->id())
                                ->first();
        }
        if (!$project) {
            return redirect()
                    ->to(route('project.create'))
                    ->with('You do not own this project, create yours.');
        }

        // After checking if the request has a project_id or not
        $project_from_request = Project::where('project', request('project_id'))->first();
        if (! $project_from_request) {
            $auth_user_project = Project::where('user_id', auth()->id())->first()->project;
            return redirect()->to(route('home', $auth_user_project));
        }
        return $next($request);
    }
}

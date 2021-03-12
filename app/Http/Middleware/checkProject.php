<?php

namespace App\Http\Middleware;

use App\Models\Project;
use Closure;
use Illuminate\Http\Request;

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
        $project = Project::find($project_id)
                            ->where('user_id', auth()->id())
                            ->first();
        if (!$project) {
            return redirect()
                    ->to(route('project.create'))
                    ->with('You do not own this project, create yours.');
        }

        // After checking if the user has a project or not, let's check if the current project is his own
        $project_from_request = Project::where('project', request('project_id'))->where('user_id', auth()->id())->first();
        if (! $project_from_request) {
            $auth_user_project = Project::where('user_id', auth()->id())->first()->project;
            return redirect()->to(route('home', $auth_user_project));
        }
        return $next($request);
    }
}

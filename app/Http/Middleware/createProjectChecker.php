<?php

namespace App\Http\Middleware;

use App\Models\Project;
use Closure;
use Illuminate\Http\Request;

class createProjectChecker
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

        // Check if the user has already at least one project and he's on trial
        $projects = Project::where('user_id', auth()->id())->get();
        if (count($projects) > 0) {
            return redirect(route('projects.manage'))->with('status', __('saas.You already have a project, delete it to create another one. During free trial, you are allowed to create just 1 project.'));
        }

        return $next($request);
    }
}

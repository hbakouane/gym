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
        $project_id = Project::getProjectId();
        $project = Project::find($project_id)
                            ->where('user_id', auth()->id())
                            ->first();
        if (!$project) {
            return redirect()
                    ->to(route('project.create'))
                    ->with('You do not own this project, create yours.');
        }
        return $next($request);
    }
}

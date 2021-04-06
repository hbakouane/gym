<?php

namespace App\Http\Middleware;

use App\Models\Project;
use Closure;
use Illuminate\Http\Request;

class subscriptionChecker
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
        // Get the current project
        $project = Project::where('project', request('project_id'))->first();
        if (empty($project->ended_at)) {
            return redirect(route('plans.show', ['project' => $project->project]))->with('status', __('saas.Please select a plan to go with'));
            $project->ended_at = now();
        }

        // Check if the user has an expired free trial
        // NB: Free trial is true means that the free trial has been already taken by this user.
        if ($project->ended_at < now()->toDateString() AND $project->free_trial == false) {
            $project->update(['trial' => true]);
            return redirect(route('plans.show', ['project' => $project->project]))->with(['status' => __('saas.Your free trial has expired, pick up a plan.')]);
        }

        // Check if the user had a valid subscription
        if ($project->ended_at < now()->toDateString()) {
            $project->update(['subscribed' => false]);
            return redirect(route('plans.show', ['project' => $project->project]))->with(['status' => __('saas.Membership expired, please purchase your subscription.')]);
        }
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Saas\Subscription;
use App\Models\PlanFeature;
use App\Models\Project;
use App\Models\User;

class projectLimitChecker
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
        // This middleware will check if the user's current projects are more 
        // that what he's allowed to have by his plan
        
        $user = getAdmin();

        // Continue this script just if the user is subscribed
        if ($user->isSubscribed()) {
            $stay = null;
            // Get the current user subscription
            $subscription = Subscription::where('user_id', $user->id)->orderBy('id', 'DESC')->first();
            // Get the plan which correspends to this subscription
            $planFeature = PlanFeature::where('name', 'project.create')->where('plan_id', $subscription->plan_id)->first();
            // get all user projects
            $projects = Project::getUserProjects();
            // Get a user project just in case
            $project = Project::where('user_id', $user->id)
                                ->where('project', $prefix ?? request('project_id'))->first() 
                                ?? 
                                Project::where('user_id', $user->id)->first();
            
            if (count($projects) >= 1) {
                if (count($projects) > $planFeature->number) {
                    $stay = false;
                    $response = __('features-check.project_advertissement', ['plan_projects_nbr' => $planFeature->number, 'actual_nbr' => count($projects)]);
                    $route = 'projects.manage';
                }
            }

            if (filled($stay) AND $stay == false) {
                session()->flash('status', $response ?? null);
                return redirect(route($route ?? 'home', $params ?? $project->project));
            }
        }
        return $next($request);
    }
}

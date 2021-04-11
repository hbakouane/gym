<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Membership;
use App\Models\Payment;
use App\Models\PlanFeature;
use App\Models\Project;
use App\Models\Saas\Subscription;
use App\Models\Staff;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class PlanFeaturesCheckerController extends Controller
{
    public static function check($feature, $prefix = null)
    {
        // Get user projects so we can check if has already some projects or not
        $projects = Project::where('user_id', auth()->id())->get();
        if (count($projects) == 0) {
            return false;
        }
        $stay = null;
        // Get the current user subscription
        $subscription = Subscription::where('user_id', auth()->id())->orderBy('id', 'DESC')->first();
        // Get the plan which correspends to this subscription
        $planFeature = PlanFeature::where('name', $feature)->where('plan_id', $subscription->plan_id)->first();
        // Get a user project just in case
        $project = Project::where('user_id', auth()->id())
                            ->where('project', $prefix ?? request('project_id'))->first() 
                            ?? 
                            Project::where('user_id', auth()->id())->first();
        // Continue this script just if the user is subscribed
        if (!auth()->user()->isSubscribed()) {
            dd('not subs');
            return redirect(route('plans.show', ['project' => $project->project]));
        }

        // Start checking
        // Creating projects
        if ($feature == "project.create") {
            // get all user projects
            $projects = Project::getUserProjects();
            if (count($projects) >= 1) {
                if (count($projects) >= $planFeature->number) {
                    $stay = false;
                    $response = __('features-check.project_advertissement', ['plan_projects_nbr' => $planFeature->number, 'actual_nbr' => count($projects)]);
                }
            }
        }

        // Creating members
        if ($feature == "members.create") {
            // Get created members
            $members = Member::where('project_id', $project->id)->get();
            if (count($members) >= $planFeature->number) {
                $stay = false;
                $response = __('features-check.members_creation', ['actual' => count($members), 'plan' => $planFeature->number]);
            }
        }

        // Creating vendors
        if ($feature == "vendors.create") {
            // Get the created vendors
            $vendors = Vendor::where('project_id', $project->id)->get();
            if (count($vendors) >= $planFeature->number) {
                $stay = false;
                $response = __('features-check.vendors_creation', ['actual' => count($vendors), 'plan' => $planFeature->number]);
            }
        }

        // Creating staves
        if ($feature == "staves.create") {
            // Get the created staves
            $staves = Staff::where('project_id', $project->id)->get();
            if (count($staves) >= $planFeature->number) {
                $stay = false;
                $response = __('features-check.staves_creation', ['plan' => $planFeature->number, 'actual' => count($staves)]);
            }
        }

        // Memberships creation
        if ($feature == "memberships.create") {
            // Get the memberships
            $memberships = Membership::where('project_id', $project->id)->get();
            if (count($memberships) >= $planFeature->number) {
                $stay = false;
                $response = __('features-check.members_creation', ['actual' => count($memberships), 'plan' => $planFeature->number]);
            }
        }

        // Payments creation
        if ($feature == "payments.create") {
            // Get the payments
            $payments = Payment::where('project_id', $project->id)->get();
            if (count($payments) >= $planFeature->number) {
                $stay = false;
                $response = __('features-check.payments_creation', ['plan' => $planFeature->number, 'actual' => count($payments)]);
            }
        }

        if (filled($stay) AND $stay == false) {
            session()->flash('status', $response ?? null);
            return redirect(route($route ?? 'home', $params ?? $project->project));
        }
    }
}

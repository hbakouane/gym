<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class SassController extends Controller
{
    public function index()
    {
        // Return 404 if there is no project GET var in the url
        if (! request('project')) {
            abort(404);
        }
        $project = Project::where('project', request('project'))->where('user_id', auth()->id())->first();

        // Check if this project exists and belongs to the auth user
        if (! $project) {
            abort(404);
        }

        if ($project->ended_at >= now()->toDateString() AND request('upgrade') == false) {
            return redirect(route('home', $project->project));
        }
        return view('saas.plans', ['project' => $project]);
    }
}

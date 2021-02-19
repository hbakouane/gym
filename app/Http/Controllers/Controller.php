<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\URL;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getPrefix()
    {
        // Get url
        $url = URL::current();

        // Split the url
        $prefix = explode('/', $url)[3];
        return $prefix;
    }

    public function getPrefixOrFail()
    {
        // Get url
        $url = URL::current();

        // Split the url
        $prefix = explode('/', $url)[3];

        // Check if this project_id (prefix) belongs to the user or return 404
        $projects = Project::where('user_id', auth()->id())->get();
        foreach ($projects as $project) {
            $projects_ids = [];
            array_push($projects_ids, $project->project);
        }

        // Return 404 if the user doesn't own this project
        if (!in_array($prefix, $projects_ids)) {
            abort(404);
        }
        return $prefix;
    }
}

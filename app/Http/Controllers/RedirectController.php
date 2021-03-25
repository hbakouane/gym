<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function redirect()
    {
        $project = Project::where('user_id', auth()->id())->first();
        return redirect(route('home', $project->project));
    }
}

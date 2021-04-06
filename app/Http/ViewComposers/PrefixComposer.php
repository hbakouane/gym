<?php

namespace App\Http\ViewComposers;

use App\Models\Project;
use App\Models\Website;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class PrefixComposer
{
    public function compose(View $view) {
        $prefix = request()->route()->project_id ?? Project::where('user_id', auth()->id())->first()->project ?? '';
        $website = Project::where('project', $prefix)->first();
        $saas = Website::first();
        $view->with([
            'prefix' => $prefix,
            'website' => $website,
            'saas' => $saas
        ]);
    }
}

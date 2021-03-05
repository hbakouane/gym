<?php

namespace App\Http\ViewComposers;

use App\Models\Project;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class PrefixComposer
{
    public function compose(View $view) {
        $prefix = request()->route()->project_id ?? Project::where('user_id', auth()->id())->first()->project ?? '';
        $view->with([
            'prefix' => $prefix
        ]);
    }
}

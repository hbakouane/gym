<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

class PrefixComposer
{
    public function compose(View $view) {
        $prefix = request()->route()->project_id;
        $view->with([
            'prefix' => $prefix
        ]);
    }
}

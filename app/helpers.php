<?php

use Illuminate\Support\Str;

if (!function_exists('makeProfileImg'))
{
    function makeProfileImg($path = null, $unknown = false)
    {
        $user = auth()->user();
        if (empty($user->profile_img) AND !$path) {
            $src = url('images/profile.jpg');
        } elseif ($path) {
            $src = $path;
        } elseif ($unknown) {
            $src = url('images/profile.jpg');
        } else {
            $src = $user->profile_img;
        }

        return $src;
    }
}

if (!function_exists('handleErrorClass'))
{
    function handleErrorClass($errors, string $field, $success = null, $danger = null)
    {
        if ($errors->has($field)) {
            return $danger ?? 'is-invalid';
        } else {
            return $success ?? 'is-valid';
        }
    }
}

if (!function_exists('getRouteName'))
{
    function getRouteName($modelSource, $method)
    {
        $model_path = "App\Models" . "\"";
        $withoutSlash = stripslashes(Str::of($modelSource)->after("Models"));
        $method = '.' . $method;
        return strtolower($withoutSlash) . 's' . $method ?? '';
    }
}

if (!function_exists('checkRole')) {
    function checkRole($permissions, $needle) {
        if(str_contains($permissions, $needle)):
            echo "checked";
        endif;
    }
}

if (!function_exists('makeLink')) {
    function makeLink($id) {
        $route = \Illuminate\Support\Facades\Route::getCurrentRoute();
        if ($route != "homepage") {
            return route('homepage') . '#' . $id;
        }
        return $id;
    }
}


if (!function_exists('makeLogo')) {
    function makeLogo($mode = 'dark', $dimensions = [100, ''], $alt = null, $ext = 'png') {
        $saas = \App\Models\Website::first();
        $alt = env('APP_NAME') . ' - ' . $saas->sentence;
        $src = url("images/logo$mode.$ext");
        return "<img class='img-fluid logo' src='$src' alt='$alt' style='height: $dimensions[0]px; width: $dimensions[1]px'>";
    }
}


if (!function_exists('getAdmin')) {
    // This method is there to get the admin because sometimes the staff who's connected not the admin himself
    function getAdmin() {
        if (auth()->guard('staff')->check()) {
            // Check if the auth user is a staff => get the admin id
            $project_id = auth()->guard('staff')->user()->project_id;
            $project = App\Models\Project::where('id', $project_id)->first();
            // We already have a relationship between the User and the Project models
            $user = $project->user;
        } else {
            $user = auth()->user();
        }
        return $user;
    }
}


if (!function_exists('staffHasRole')) {
    // This method is there to get the admin because sometimes the staff who's connected not the admin himself
    function staffHasRole($routeToCheck) {
        return App\Http\Controllers\RolesController::hasRole($routeToCheck);
    }
}

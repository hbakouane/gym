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

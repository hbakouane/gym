<?php

if (!function_exists('makeProfileImg')) {
    function makeProfileImg($path = null) {
        $user = auth()->user();
        if (empty($user->profile_img)) {
            $src = url('images/profile.jpg');
        } elseif (!empty($path)) {
            $src = $path;
        } else {
            $src = $user->profile_img;
        }

        return $src;
    }
}

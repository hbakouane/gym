<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = $file->getClientOriginalName();
            $folder = uniqid('', true) . '-' . now()->timestamp;
            $file->storeAs('public/avatars/' . $folder, $filename);
            return $folder;
        }
        return '';
    }
}

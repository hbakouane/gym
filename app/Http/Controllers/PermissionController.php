<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $role = Role::find($request->role);
        $role->update(['permissions' => $request->permissions]);
        return redirect(route('roles.index', $request->project_id))->with('status', __('response.Created successfully.'));
    }
}

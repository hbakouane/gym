<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Support\Facades\Auth;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('roles.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($prefix, $id)
    {
        $role = Role::find($id);
        return view('roles.edit', ['role' => $role]);
    }

    public static function checkRole($routeToCheck)
    {
        if (Auth::guard('staff')->check() AND !str_contains(Auth::guard('staff')->user()->role->permissions, $routeToCheck)) {
            return abort(403);
        }
        return true;
    }

    public static function hasRole($routeToCheck)
    {
        if (Auth::guard('staff')->check() AND !str_contains(Auth::guard('staff')->user()->role->permissions, $routeToCheck)) {
            return false;
        }
        return true;
    }
}

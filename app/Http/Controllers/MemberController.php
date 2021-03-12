<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Project;
use App\Models\Subscription;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('members.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $project_id = Project::getProjectId();
        $subscriptions = Subscription::where('project_id', $project_id)->get();
        return view('members.create', ['subscriptions' => $subscriptions]);
    }

    public function show($prefix, $id)
    {
        $member = Member::where('id', $id)->first();
        return view('members.show', ['member' => $member]);
    }

    public function destroy($prefix, $id)
    {
        Member::where('id', $id)->delete();
        return redirect()->to(route('home', [$prefix, $id]));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Payment;
use App\Models\Project;
use App\Models\Subscription;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $member = Member::whereHas('project', function (Builder $builder) {
            $builder->where('project', request('project_id'));
        })->where('id', $id)->firstOrFail();

        // Get the total of the payments and credits
        $payments = Payment::where('member_id', $id)->latest()->get();
        $total_paid = DB::table('payments')->where('member_id', $id)->sum('amount');
        $total_credits = DB::table('credits')->where('member_id', $id)->sum('amount');
        return view('members.show', [
            'member' => $member,
            'payments' => $payments,
            'total_credits' => $total_credits,
            'total_paid' => $total_paid
        ]);
    }

    public function destroy($prefix, $id)
    {
        Member::where('id', $id)->delete();
        return redirect()->to(route('home', [$prefix, $id]));
    }
}

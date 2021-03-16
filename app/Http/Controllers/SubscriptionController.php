<?php

namespace App\Http\Controllers;

use App\Models\Featureable;
use App\Models\Feature;
use App\Models\Project;
use App\Models\Subscription;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($prefix)
    {
        // This method will return 404 if the project id doesn't belong to the authenticated user
        $prefix = Project::getProjectIdOrFail();

        // Get subscriptions
        $subscriptions = Subscription::with('features', 'user')
                                        ->where('project_id', $prefix->id)
                                        ->orderBy('id', 'DESC')
                                        ->get();
        return view('subscriptions.index', ['subscriptions' => $subscriptions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $features = Feature::whereHas('project', function (Builder $builder) {
            $builder->where('project', request('project_id'));
        })->get();
        return view('subscriptions.create', ['features' => $features]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required',
            'price' => 'required|integer',
            'duration' => 'required',
            'features' => 'required'
        ]);
        // For more security we'll use only
        $data = $request->only(['name', 'price', 'duration', 'features']);
        $data['created_by'] = auth()->id();
        $data['project_id'] = Project::getProjectId();

        // Store the subscription
        $subscription = new Subscription();
        $subscription->create($data)->save();

        // Get the latest record id from subscriptions
        $last = Subscription::where('created_by', auth()->id())->
                              orderBy('id', 'ASC')
                              ->first();

        // Store into the featureables table
        $featurable = new Featureable();
        foreach ($data['features'] as $feature) {
            $featurable->create([
                'feature_id' => $feature,
                'featureable_type' => 'App\Models\Subscription',
                'featureable_id' => $last->id,
                'project_id' => $data['project_id']
            ])->save();
        }

        return redirect()->back()->with('status', __('plan.Subscription added successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function show(Subscription $subscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscription $subscription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscription $subscription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscription $subscription)
    {
        //
    }
}

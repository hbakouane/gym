@extends('layouts.dashboard')

@section('content')
    @php
        $page = __('plan.Subscriptions');
        // $prefix is comming from a composer located in App\Http\Controllers\ViewComposers
        $breadcumbs = [__('Dashboard') => route('home', $prefix), __('plan.Subscriptions') => route('subscriptions.index', $prefix /* Comming from a view composer */)];

        // Deal with the duration
        function makeDuration($subscription) {
            if ($subscription->duration == 30 || $subscription->duration == 31) {
                $duration = __('general.month');
            } elseif ($subscription->duration == 365 || $subscription->duration == 366) {
                $duration = __('general.year');
            } elseif ($subscription->duration == 180) {
                $duration = __('general.6 months');
            } else {
                return $subscription->duration;
            }
            return $duration;
        }
    @endphp

    <div class="row">
        @foreach($subscriptions as $subscription)
            <div class="col-md-3">
                <div class="card shadow">
                    <div class="card-header bg-dark">
                        <p class="font-weight-bold h3 text-center text-light">{{ $subscription->name }}</p>

                    </div>
                    <div class="card-body">
                        <p class="font-weight-bold h5 text-center">{{ $project->devise ?? '' . $subscription->price . '/' . makeDuration($subscription) }}</p>
                        @foreach($subscription->features as $feature)
                            <p class="card-text text-center"><i class="fa fa-check text-success"></i> {{ $feature->name }}</p>
                        @endforeach
                    </div>
                    <div class="card-footer text-muted">
                        <p>Created by <a href="">{{ $subscription->user->name }}</a></p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

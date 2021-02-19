@extends('layouts.dashboard')

@section('content')
    @php
        $page = __('plan.Subscriptions');
        $breadcumbs = [__('Dashboard') => route('home'), __('plan.Subscriptions') => route('subscriptions.index')];
    @endphp

    <div class="row">
        @foreach($subscriptions as $subscription)

        @endforeach
    </div>
@endsection

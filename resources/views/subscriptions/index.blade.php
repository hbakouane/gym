@extends('layouts.dashboard')

@section('content')
    @php
        $page = __('plan.Subscriptions');
        // $prefix is comming from a composer located in App\Http\Controllers\ViewComposers
        $breadcumbs = [__('Dashboard') => route('home', $prefix), __('plan.Subscriptions') => route('subscriptions.index', $prefix /* Comming from a view composer */)];
    @endphp

    <div class="row">
        @forelse($subscriptions as $subscription)
            <div class="col-xl-3 col-lg-3 col-md-4">
                <div class="card shadow">
                    <div class="card-header bg-dark">
                        <p class="font-weight-bold h3 text-center text-light">{{ $subscription->name }}</p>

                    </div>
                    <div class="card-body">
                        <p class="font-weight-bold h5 text-center">{{ ($website->currency ?? '') . $subscription->price . '/' . makeDuration($subscription) }}</p>
                        @foreach($subscription->features as $feature)
                            <p class="card-text text-center"><i class="fa fa-check text-success"></i> {{ $feature->name }}</p>
                        @endforeach
                    </div>
                    <div class="card-footer text-muted">
                        <p>{{ __('general.Created by') }} <span class="font-weight-bold">{{ $subscription->user->name }}</span> | {{ $subscription->created_at->diffForHumans() }}</p>
                        <div class="w-100 d-flex justify-content-center">
                            <script>
                                function validate(event) {
                                    let form = document.querySelector('#form')
                                    if (confirm("{{ __('response.All the related records to this subscription will be deleted (members, payments, memberships and ...), Would you like to continue?') }}")) {
                                        form.method = "POST"
                                        form.action = "{{ route('subscriptions.destroy', [request('project_id'), $subscription->id]) }}"
                                    } else {
                                        event.stopImmediatePropagation()
                                    }
                                }
                            </script>
                            <form id="form" method="POST" action="{{ route('subscriptions.destroy', [$prefix, $subscription->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button
                                    onclick="validate()"
                                    class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash"></i> 
                                    {{ __('general.Delete') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
        <p class="text-muted ml-3">No records to show.</p>
        @endforelse
    </div>
@endsection
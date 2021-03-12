@extends('layouts.dashboard')

@section('content')
    @php
        $page = "Profile";
        $breadcumbs = ['Dashboard' => route('home', $prefix), $member->name => route('members.show', [$prefix, $member->id])];
    @endphp
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header h4 text-dark font-weight-bold">{{ __('general.Details') }}</div>
                <div class="card-body p-0">
                    <img class="img-fluid w-100" src="{{ makeProfileImg($member->photo, true) }}">
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header h4 text-dark font-weight-bold">{{ __('general.More information') }}</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <p class="w-100"><span class="text-dark font-weight-bold h6 text-left">{{ __('auth.Name') }}</span> {{ $member->name }}</p>
                                <p class="w-100"><span class="text-dark font-weight-bold h6 text-left">{{ __('auth.Email') }}</span> {{ $member->email }}</p>
                                <p class="w-100"><span class="text-dark font-weight-bold h6 text-left">{{ __('auth.CNE') }}</span> {{ $member->cne }}</p>
                                <p class="w-100"><span class="text-dark font-weight-bold h6 text-left">{{ __('auth.Phone') }}</span> {{ $member->phone }}</p>
                            </div>
                            <div class="col-md-4">
                                <p class="w-100"><span class="text-dark font-weight-bold h6 text-left">{{ __('auth.City') }}</span> {{ $member->city }}</p>
                                <p class="w-100"><span class="text-dark font-weight-bold h6 text-left">{{ __('auth.Address') }}</span> {{ $member->address }}</p>
                                <p class="w-100"><span class="text-dark font-weight-bold h6 text-left">{{ __('auth.Phone') }}</span> {{ $member->phone }}</p>
                                <p class="w-100"><span class="text-dark font-weight-bold h6 text-left">{{ __('auth.Country') }}</span> {{ $member->country }}</p>
                            </div>
                            <div class="col-md-4">
                                <p class="w-100"><span class="text-dark font-weight-bold h6 text-left">{{ __('auth.Subscription') }}</span> <a href="{{ route('subscriptions.show', [$prefix, $member->subscription->id]) }}">{{ $member->subscription->name }}</a></p>
                                <p class="w-100" title="{{ $member->updated_at->diffForHumans() }}"><span class="text-dark font-weight-bold h6 text-left">{{ __('auth.Joined at') }}</span> {{ $member->created_at }}</p>
                                <p class="w-100" title="{{ $member->created_at->diffForHumans() }}"><span class="text-dark font-weight-bold h6 text-left">{{ __('auth.Updated at') }}</span> {{ $member->updated_at }}</p>
                                <p class="w-100"><span class="text-dark font-weight-bold h6 text-left">{{ __('auth.Status') }}</span> {{ $member->status }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header h4 text-dark font-weight-bold">{{ __('auth.About') }}</div>
                    <div class="card-body">
                        <p>{{ $member->note }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <a href="{{ route('members.index', [$prefix, $member->id, 'edit' => 'edit', 'user' => $member->id]) }}" class="btn btn-warning d-inline-block"><i class="fa fa-pencil-alt"></i> {{ __('general.Edit') }}</a>
                <form class="d-inline-block" method="POST" action="{{ route('members.destroy', [$prefix, $member->id]) }}">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> {{ __('general.Delete') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection

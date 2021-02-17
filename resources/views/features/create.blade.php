@extends('layouts.dashboard')

@section('content')
    @php
        $page = __('Add feature');
        $breadcumbs = [
            __('Dashboard') => route('home'),
            __('Features') => route('features.index'),
            __('Add') => route('features.create')
        ];
    @endphp

    <div class="card">
        <div class="card-header">
            <p class="h5 text-dark">{{ __('Add feature') }}</p>
        </div>
        <div class="card-body">
            @include('partials.errors')
            @livewire('features.form')
        </div>
    </div>
@endsection

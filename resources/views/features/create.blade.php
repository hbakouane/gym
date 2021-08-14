@extends('layouts.dashboard')

@section('content')
    @php
        $page = __('Add feature');
        $breadcumbs = [
            __('Dashboard') => route('home', $prefix),
            __('Features') => route('features.index', $prefix),
            __('Add') => route('features.create', $prefix)
        ];
    @endphp

    <div class="card">
        <div class="card-header">
            <p class="h5 text-dark">{{ __('Add feature') }}</p>
        </div>
        <div class="card-body">
            @include('partials.errors')
            @livewire('features.form', ['prefix' => $prefix])
        </div>
    </div>
@endsection

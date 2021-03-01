@extends('layouts.dashboard')

@section('content')
    @php
        $page = __('Features');
        $breadcumbs = [
            __('Dashboard') => route('home', $prefix),
            __('Features') => route('features.index', $prefix)
        ];
    @endphp

    @livewire('features.index')
@endsection

@extends('layouts.dashboard')

@section('content')
    @php
        $page = __('Features');
        $breadcumbs = [
            __('Dashboard') => route('home'),
            __('Features') => route('features.index')
        ];
    @endphp

    @livewire('features.index')
@endsection

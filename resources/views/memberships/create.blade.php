@extends('layouts.dashboard')

@section('content')
    @php
        $page = __('pages.Add a membership');
        $breadcumbs = ['Dashboard' => route('home', $prefix), $page => route('memberships.create', $prefix)];
    @endphp
    @livewire('membership.create', ['prefix' => $prefix])
@endsection

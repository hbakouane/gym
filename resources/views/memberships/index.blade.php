@extends('layouts.dashboard')

@section('content')
    @php
        $page = __('pages.All Memberships');
        $breadcumbs = ['Dashboard' => route('home', $prefix), $page => route('members.index', $prefix)];
    @endphp
    @livewire('memberships.index', ['prefix' => $prefix])
@endsection

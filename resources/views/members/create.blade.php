@extends('layouts.dashboard')

@section('content')
    @php
        $page = __('pages.Add a member');
        $breadcumbs = ['Dashboard' => route('home', $prefix), $page => route('members.create', $prefix)];
    @endphp
    @livewire('members.create', ['subscriptions' => $subscriptions, 'project_id' => $prefix])
@endsection

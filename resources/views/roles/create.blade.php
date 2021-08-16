@extends('layouts.dashboard')

@section('content')
    @php
        $page = __('pages.Add a role');
        $breadcumbs = ['Dashboard' => route('home', $prefix), $page => route('roles.create', $prefix)];
    @endphp
    @livewire('roles.create', ['prefix' => $prefix])
@endsection

@extends('layouts.dashboard')

@section('content')
    @php
        $page = __('auth.Role');
        $breadcumbs = ['Dashboard' => route('home', $prefix), $page => route('roles.index', $prefix)];
    @endphp
    @livewire('roles.index', ['prefix' => $prefix])
@endsection

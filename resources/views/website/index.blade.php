@extends('layouts.dashboard')

@section('content')
    @php
        $page = __('website.Project settings');
        $breadcumbs = ['Dashboard' => route('home', $prefix), $page => route('website.settings',$prefix)];
    @endphp
    @livewire('website.index', ['prefix' => $prefix])
@endsection

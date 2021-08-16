@extends('layouts.dashboard')

@section('content')
    @php
        $page = __('pages.Add a vendor');
        $breadcumbs = ['Dashboard' => route('home', $prefix), $page => route('vendors.index', $prefix)];
    @endphp
    @livewire('vendors.create', ['project_id' => $prefix])
@endsection

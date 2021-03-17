@extends('layouts.dashboard')

@section('content')
    @php
        $page = __('pages.Vendors');
        $breadcumbs = ['Dashboard' => route('home', $prefix), $page => route('vendors.index', $prefix)];
    @endphp
    @livewire('vendors.index', ['prefix' => $prefix])
@endsection

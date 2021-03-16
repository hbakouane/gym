@extends('layouts.dashboard')

@section('content')
    @php
        $page = __('pages.Add a credit');
        $breadcumbs = ['Dashboard' => route('home', $prefix), $page => route('credits.create', $prefix)];
    @endphp
    @livewire('credits.create', ['prefix' => $prefix])
@endsection

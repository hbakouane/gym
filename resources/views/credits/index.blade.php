@extends('layouts.dashboard')

@section('content')
    @php
        $page = __('pages.Credits');
        $breadcumbs = ['Dashboard' => route('home', $prefix), $page => route('credits.index', $prefix)];
    @endphp
    @livewire('credits.index')
@endsection

@extends('layouts.dashboard')

@section('content')
    @php
        $page = __('pages.Staves');
        $breadcumbs = ['Dashboard' => route('home', $prefix), $page => route('staves.index', $prefix)];
    @endphp
    @livewire('staves.index', ['prefix' => $prefix])
@endsection

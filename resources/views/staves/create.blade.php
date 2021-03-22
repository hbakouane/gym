@extends('layouts.dashboard')

@section('content')
    @php
        $page = __('pages.Add a staff');
        $breadcumbs = ['Dashboard' => route('home', $prefix), $page => route('staves.create', $prefix)];
    @endphp
    @livewire('staves.create', ['prefix' => $prefix])
@endsection

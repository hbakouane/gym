@extends('layouts.dashboard')

@section('content')
    @php
        $page = __('pages.Members');
        $breadcumbs = ['Dashboard' => route('home', $prefix), $page => route('members.index', $prefix)];
    @endphp
    @livewire('members.index', ['prefix' => $prefix])
@endsection

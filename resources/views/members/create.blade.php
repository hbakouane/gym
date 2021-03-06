@extends('layouts.dashboard')

@section('content')
    @php
        $page = __('pages.Add a member');
        $breadcumbs = ['Dashboard' => route('home', $prefix), $page => route('members.index', $prefix)];
    @endphp

@endsection

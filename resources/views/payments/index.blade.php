@extends('layouts.dashboard')

@section('content')
    @php
        $page = __('pages.Payments');
        $breadcumbs = ['Dashboard' => route('home', $prefix), __('pages.Payments') => route('payments.index', $prefix)];
    @endphp
    @livewire('payments.index')
@endsection

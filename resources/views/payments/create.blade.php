@extends('layouts.dashboard')

@section('content')
    @php
        $page = __('payments.Add a payment');
        $breadcumbs = ['Dashboard' => route('home', $prefix), __('payments.Add a payment') => route('payments.create', $prefix)];
    @endphp
    @livewire('payments.create')
@endsection

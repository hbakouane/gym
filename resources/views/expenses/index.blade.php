@extends('layouts.dashboard')

@section('content')
    @php
        $page = __('pages.Expenses');
        $breadcumbs = ['Dashboard' => route('home', $prefix), $page => route('expenses.index', $prefix)];
    @endphp
    @livewire('expenses.index', ['prefix' => $prefix])
@endsection

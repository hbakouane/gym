@extends('layouts.dashboard')

@section('content')
    @php
        $page = __('pages.Expenses');
        $breadcumbs = ['Dashboard' => route('home', $prefix), $page => route('expenses.edit', [$prefix, request('expense')])];
    @endphp
    @livewire('expenses.edit', ['prefix' => $prefix])
@endsection

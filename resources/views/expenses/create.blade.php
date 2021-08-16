@extends('layouts.dashboard')

@section('content')
    @php
        $page = __('pages.Add an expense');
        $breadcumbs = ['Dashboard' => route('home', [$prefix]), $page => route('expenses.create', $prefix)];
    @endphp
    @livewire('expenses.create', ['prefix' => $prefix])
@endsection

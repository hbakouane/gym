@extends('layouts.dashboard')

@section('content')
    @php
        $page = __('general.Edit') . ' ' . strtolower(__('credits.Credit'));
        $breadcumbs = ['Dashboard' => route('home', $prefix), $page => route('credits.edit', [$prefix, request('credit')])];
    @endphp
    @livewire('credits.edit')
@endsection

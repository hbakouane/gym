@extends('layouts.dashboard')

@section('content')
    @php
        $page = __('staves.Edit a staff');
        $breadcumbs = ['Dashboard' => route('home', $prefix), $page => route('staves.edit', [$prefix, request('stafe')])];
    @endphp
    @livewire('staves.edit', ['prefix' => $prefix, 'staffId' => request('stafe')])
@endsection

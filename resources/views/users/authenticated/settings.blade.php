@extends('layouts.dashboard')

@section('content')
    @php
        $page = __('pages.Settings');
        $breadcumbs = ['Dashboard' => route('home', $prefix), __('pages.User settings') => route('user.settings.show')];
    @endphp
    @livewire('users.settings')
@endsection

@extends('layouts.blank_with_logo')

@section('content')
    @php
        $page = __('project.Manage projects');
        $breadcumbs = ['Dashboard' => route('home', $prefix), $page => route('projects.manage', $prefix)];
    @endphp
    @livewire('projects.manage')
@endsection

@extends('layouts.blank_with_logo')

@section('content')
    @php
        $page = __('project.Create a Project');
    @endphp
    <div class="container py-5">
        <div class="d-flex justify-content-center">
            <img src="{{ url('images/logo.png') }}" class="img-fluid logo-auth" alt="This is an alt">
        </div>
        @livewire('projects.create-project')
    </div>
@endsection

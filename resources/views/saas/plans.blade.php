@extends('layouts.blank_with_logo')

@section('content')
    @php
        $page = __('saas.Our plans');
    @endphp
    @include('partials.session', ['class' => 'text-center'])
    <div class="container my-5">
        @include('partials.saas_subs_status', ['currentProject' => $project])
        @include('partials.pricing')
    </div>
@endsection

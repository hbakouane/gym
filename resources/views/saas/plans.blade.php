@extends('layouts.blank_with_logo')

@section('content')
    @php
        $page = __('saas.Our plans');
    @endphp
    @include('partials.session')
    <div class="container my-5">
        @include('partials.pricing')
    </div>
@endsection

@extends('layouts.external')

@section('content')
    @include('external.hero')
    @include('external.features')
    @include('external.details')
    @include('external.pricing')
{{--    @include('external.brands')--}}
    @include('external.testimonials')
    @include('external.cta')
@endsection

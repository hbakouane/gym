@extends('layouts.external')

@section('content')
    @include('external.hero')
    @include('external.what-we-offer')
    @include('external.members')
    @include('external.staves')
    @include('external.new-features')
    @include('external.pricing')
    @include('external.testimonials')
    @livewire('external.contact')
    {{-- @include('external.hero') --}}
    {{-- @include('external.features') --}}
    {{-- @include('external.details') --}}
    {{-- @include('external.pricing') --}}
{{--    @include('external.brands')--}}
    {{-- @include('external.testimonials') --}}
    {{-- @livewire('external.contact', ['class' => 'py-5 bg-dark', 'text' => 'text-light py-3']) --}}
    {{-- @include('external.cta') --}}
@endsection

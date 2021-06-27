@extends('layouts.external')

@section('content')
    <script>
        /* data = {
            "data": [
                {
                    "event_name": "TestEvent",
                    "event_time": 1624637612,
                    "user_data": {
                        "em": "f660ab912ec121d1b1e928a0bb4bc61b15f5ad44d5efdc4e1c92a25e99b8e44a"
                    }
                }
            ],
            "test_event_code": "TEST5120"
        }
        alert(data)
        fetch('https://graph.facebook.com/421465135916651/events?access_token=EAABxm60ACBwBAMEN2OKP9swcN8IppAxKxZCCNjMmmwbWmv4Lz40DgPkrWXtDHnEDd3MD60ZCvZBor9tVRv30lACZAocL0XJwgc8ZBCOs893pLhIrMOEsw2mZANmIA5KNBsjm3o9VXZCcYxccYbALSSn3nrw3WWsAcWRKqryuwoZB5w17WNrruK8qZCBIKCKBbZBYEZD', {
            method: 'POST',
            body: JSON.stringify(data),
            headers: {
                'Content-Type': 'application/json'
            },
            mode: 'cors'
        })
        .then(res => console.log('hello', res.json()))
        .catch(err => console.log('hello', err.json())) */
    </script>
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

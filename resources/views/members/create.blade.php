@extends('layouts.dashboard')

@section('content')
    @php
        $page = __('pages.Add a member');
        $breadcumbs = ['Dashboard' => route('home', $prefix), $page => route('members.index', $prefix)];
    @endphp
    @livewire('members.create', ['subscriptions' => $subscriptions])
@endsection

@section('scripts')
    <script>
        const inputElement = document.querySelector('#photo');
        const pond = FilePond.create( inputElement );
        FilePond.setOptions({
            server: {
                url: '/upload',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }
        });
    </script>
@endsection

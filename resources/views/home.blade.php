@extends('layouts.dashboard')

@section('content')
    @livewire('dashboard', ['prefix' => $prefix])
@endsection

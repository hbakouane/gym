@extends('layouts.dashboard')

@section('content')
    @php
        $page = __('payments.Edit payment');
        $breadcumbs = ['Dashboard' => route('home', [$prefix]), $page => route('payments.edit', [$prefix, $payment->id])];
    @endphp
    @livewire('payments.edit')
@endsection

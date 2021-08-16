@extends('layouts.auth')

@section('content')
    @php
        $page = __('Reset Password');
    @endphp
    <div class="row">
        <div class="col-md-4 short-side py-5">
            <div class="d-flex justify-content-center my-4">
                <img class="img-fluid logo-auth" src="{{ url('images/logo.png') }}">
            </div>
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        @include('partials.errors')
                        @include('partials.session')

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope"></i></span>
                            </div>
                            <input type="email" id="email" name="email" class="form-control input" placeholder="{{ __('E-Mail Address') }}">
                        </div>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary btn-main">
                                {{ __('Send Reset Link') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8 bg-side">
            Hell
        </div>
    </div>
@endsection

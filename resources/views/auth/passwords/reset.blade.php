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
                    @include('partials.errors')
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope"></i></span>
                            </div>
                            <input type="email" id="email" name="email" value="{{ request('email') }}" class="form-control input" placeholder="{{ __('E-Mail Address') }}">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope"></i></span>
                            </div>
                            <input type="password" id="password" name="password" class="form-control input" placeholder="{{ __('Password') }}">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope"></i></span>
                            </div>
                            <input type="password" id="password" name="password_confirmation" class="form-control input" placeholder="{{ __('settings.Password_confirm') }}">
                        </div>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary btn-main">
                                {{ __('Reset Password') }}
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

@extends('layouts.auth')

@section('content')
@php
    $page = __('auth.Register');
@endphp
<div class="row">
    <div class="col-md-4 short-side py-5">
        <div class="d-flex justify-content-center my-4">
            <img class="img-fluid logo-auth" src="{{ url('images/logo.png') }}">
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <form method="POST" class="mt-4" action="{{ route('register') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                        </div>
                        <input type="text" name="name" id="name" class="form-control input" placeholder="{{ __('settings.Name') }}">
                    </div>
                    @error('name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope"></i></span>
                        </div>
                        <input type="email" id="email" name="email" class="form-control input" placeholder="{{ __('settings.Email') }}">
                    </div>
                    @error('email')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-key"></i></span>
                        </div>
                        <input type="password" name="password" id="password" class="form-control password input" placeholder="{{ __('settings.Password') }}">
                        <div class="input-group-prepend" onclick="showPassword()" style="cursor: pointer;">
                            <span class="input-group-text" id="pass_btn"><i class="fa fa-eye"></i></span>
                        </div>
                    </div>
                    @error('password')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-key"></i></span>
                        </div>
                        <input type="password" id="password_confirm" name="password_confirmation" class="form-control password input" placeholder="{{ __('settings.Password_confirm') }}">
                    </div>
                    @error('password_confirm')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror

                    <div class="d-flex justify-content-center">
                        <button class="btn btn-primary btn-main">{{ __('auth.Register') }}</button>
                    </div>

                    <div class="d-flex justify-content-center mt-2">
                        <a class="btn btn-link" href="{{ route('login') }}">
                            {{ __('auth.Login') }}
                        </a>
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8 bg-side"></div>
    
    <script>
        let showPassword = () => {
            document.querySelectorAll('input[type="password"]').forEach(password => {
                password.type = "text"
            });
            if (document.querySelector('#pass_btn > i').classList.contains('fa-eye-slash')) {
                document.querySelectorAll('.password').forEach(password => {
                    password.type = "password"
                });
                document.querySelector('#pass_btn > i').classList.add('fa-eye')
                return document.querySelector('#pass_btn > i').classList.remove('fa-eye-slash')
            }
            document.querySelector('#pass_btn > i').classList.remove('fa-eye')
            document.querySelector('#pass_btn > i').classList.add('fa-eye-slash')
        }
    </script>

</div>
@endsection

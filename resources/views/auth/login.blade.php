@extends('layouts.auth')

@section('content')
    @php
        $page = __('auth.Login');
    @endphp
    <div class="row">
        <div class="col-md-4 short-side py-5">
            <div class="d-flex justify-content-center my-4">
                <img class="img-fluid logo-auth" src="{{ url('images/logo.png') }}">
            </div>
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        @include('partials.errors')
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope"></i></span>
                            </div>
                            <input type="email" id="email" name="email" class="form-control input" placeholder="{{ __('settings.Email') }}">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-key"></i></span>
                            </div>
                            <input type="password" id="password" name="password" class="form-control input" placeholder="{{ __('settings.Password') }}">
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary btn-main">
                                {{ __('Login') }}
                            </button>
                        </div>
                        @if (Route::has('password.request'))
                            <div class="d-flex justify-content-center">
                                <a class="btn btn-link" href="{{ route('register') }}">
                                    {{ __('auth.Register') }}
                                </a>
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('auth.Forgot Your Password?') }}
                                </a>
                                <a class="btn btn-link" href="{{ route('staff.login.get') }}">
                                    {{ __('auth.Staff portal') }}
                                </a>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8 bg-side"></div>
    </div>
@endsection

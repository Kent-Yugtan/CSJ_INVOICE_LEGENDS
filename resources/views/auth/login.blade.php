@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card" style="height: 580px; width:450px">
                <!-- <div class="card-header">
                    {{ __('Login') }}
                </div> -->
                <div style="text-align: center;height: 100px; padding-top: 20px;padding: 38px 0;font-size:40px">
                    {{ __('LOGO') }}
                </div>
                <div class="input-color" style="text-align: center; font-size:30px;">
                    {{ __('5PP Invoicing App') }}
                </div>
                <div style="text-align: center; padding-top:25px;font-size:25px">
                    {{ __('Login') }}
                </div>

                <div class="input-color" style="text-align: center;">
                    {{ __('Enter your email and password below') }}
                </div>


                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label class="input-color" for="email">{{ __('EMAIL ADDRESS') }}
                            </label>

                            <div class="col-md-12" style="padding-top:10px">
                                <input id="email" placeholder="Email Address" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">

                            <div class="col-md-6">
                                <label class="input-color" for="password">{{ __('PASSWORD') }}</label>
                            </div>
                            <div class="col-md-6 text-end">
                                @if (Route::has('password.request'))
                                <a style="text-decoration: none; " class="btn input-color"
                                    href="{{ route('password.request') }}">
                                    {{ __('Forgot Password?') }}
                                </a>
                                @endif
                            </div>

                            <div class="col-md-12" style="padding-top:10px">
                                <input id="password" placeholder="Password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!-- <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div> -->

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <button type="submit"
                                    style="width:100%; height:50px;color:white; background-color: #CF8029;" class="btn">
                                    {{ __('Login') }}
                                </button>

                                <!-- @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif -->
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12" style="text-align: center">
                                <label class="input-color">{{ __('Don\'t have an account?') }} </label>
                                @if (Route::has('register'))
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Sign up') }}</a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
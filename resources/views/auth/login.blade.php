@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-5">
      <div class="card" style="min-height: 580px; width:450px">
        <!-- <div class="card-header">
                    {{ __('Login') }}
                </div> -->
        <div style="text-align: center;height: 100px; padding-top: 20px;padding: 38px 0;font-size:40px">
          <img class="img-team" src="{{ URL('images/Invoices-logo.png')}}" style="width: 65px" />

        </div>
        <div class="input-color" style="text-align: center; font-size:30px;">
          {{ __('5PP Invoicing App') }}
        </div>
        <div style="text-align: center; padding-top:25px;font-size:25px">
          <strong> {{ __('Login') }} </strong>
        </div>

        <div class="input-color" style="text-align: center;">
          {{ __('Enter your email and password below') }}
        </div>

        <div class="card-body">
          <form id="form_login">
            <div id="error_msg" class="alert alert-danger text-center"></div>
            @CSRF
            <div class="row mb-3">
              <label class="input-color" for="email">{{ __('EMAIL ADDRESS') }}
              </label>

              <div class="col-md-12" style="padding-top:10px">
                <input id="email" placeholder="Email Address" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">

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
              <!-- <div class="col-md-6 text-end">
                                @if (Route::has('password.request'))
                                <a style="text-decoration: none; " class="input-color"
                                    href="{{ route('password.request') }}">
                                    {{ __('Forgot Password?') }}
                                </a>
                                @endif
                            </div> -->

              <div class="col-md-12" style="padding-top:10px">
                <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">

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
                <button type="submit" style="width:100%; height:50px;color:white; background-color: #CF8029;" class="btn">
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
                <!-- @if (Route::has('register')) -->
                <!-- <a class="nav-link" href="{{ route('auth.register') }}">{{ __('Sign up') }}</a> -->
                <!-- @endif -->
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $("#error_msg").hide();
  $(document).ready(function() {

    $('#form_login').submit(function(e) {
      e.preventDefault();
      $("#error_msg").hide();

      let email = $("#email").val();
      let password = $("#password").val();
      let data = {
        email,
        password
      };

      axios.post(apiUrl + '/api/login', data, {
          Headers: {
            Authorization: token,
          },
        }).then(function(response) {
          let data = response.data;
          // console.log('then', data);
          if (!data.succcess) {
            $("#error_msg").html(data.message).show();
          } else {
            if (data.user.role === "Admin") {
              localStorage.token = data.token;
              // localStorage.userdata = JSON.parse(data.user);
              window.location.replace(apiUrl + '/admin/dashboard');
            } else {
              localStorage.token = data.token;
              window.location.replace(apiUrl + '/user/dashboard');
            }
          }
        })
        .catch(function(error) {
          console.log('catch', error);
        });
    })
  });
</script>
@endsection
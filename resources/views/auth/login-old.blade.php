@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12" style="display:flex;justify-content:center">
      <div class="card shadow" style="min-height: 450px; width:450px">
        <div style="text-align: center;height: 100px; padding-top: 20px;padding: 38px 0;font-size:40px">
          <img class="img-team" src="{{ URL('images/Invoices-logo.png')}}" style="width: 65px" />
        </div>
        <div class="input-color" style="text-align: center; font-size:30px;padding-top:20px">
          {{ __('5PP Invoicing App') }}
        </div>
        <div style="text-align: center;font-size:25px">
          <strong> Login </strong>
        </div>

        <div class="input-color" style="text-align: center;">
          {{ __('Enter your email and password below') }}
        </div>

        <div class="card-body">
          <form action="{{ route('login) }}" method="POST">
            <div id="error_msg" class="alert alert-danger text-center"></div>
            @csrf
            <div class="row">
              <div class="col-md-12" style="padding-top:10px">
                <div class="form-outline mb-3">
                  <input id="email" placeholder="Enter a valid email address" type="text" class="form-control"
                    name="email">
                  <label class="form-label" for="email">Email Address</label>
                </div>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-12" style="padding-top:10px">
                <div class="form-outline">
                  <input id="password" placeholder="Enter password" type="password" class="form-control"
                    name="password">
                  <label class="form-label" for="password">Password</label>
                </div>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-12">
                <button type="submit" style="width:100%; height:50px;color:white; background-color: #CF8029;"
                  class="btn">
                  Login
                </button>
              </div>
            </div>


            <div class="row">
              <div class="col-md-12" style="text-align: center">

              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
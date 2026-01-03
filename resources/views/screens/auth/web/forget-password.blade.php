{{-- @extends('layouts.web.guest')

@section('content')

<section class="forget-password-page account">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="block text-center">
          <a class="logo" href="index.html">
            <img src="images/logo.png" alt="">
          </a>
          <h2 class="text-center">Welcome Back</h2>
          <form class="text-left clearfix">
            <p>Please enter the email address for your account. A verification code will be sent to you. Once you have received the verification code, you will be able to choose a new password for your account.</p>
            <div class="form-group">
              <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Account email address">
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-main text-center">Request password reset</button>
            </div>
          </form>
          <p class="mt-20"><a href="login.html">Back to log in</a></p>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection --}}

@extends('layouts.web.guest')

@section('content')
<section class="forget-password-page account">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="block text-center">
          <a class="logo" href="{{ url('/') }}">
            <img src="{{ asset('images/logo.png') }}" alt="">
          </a>

          <h2 class="text-center">Forgot Password</h2>

          {{-- Success Message --}}
          @if (session('status'))
              <div class="alert alert-success">
                  {{ session('status') }}
              </div>
          @endif

          <form class="text-left clearfix" method="POST" action="{{ route('password.email') }}">
            @csrf

            <p>
              Please enter your registered email address.
              We will send you a password reset link.
            </p>

            <div class="form-group">
              <input type="email"
                     name="email"
                     class="form-control"
                     placeholder="Account email address"
                     value="{{ old('email') }}"
                     required>
            </div>

            @error('email')
              <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="text-center">
              <button type="submit" class="btn btn-main text-center">
                Request Password Reset
              </button>
            </div>
          </form>

          <p class="mt-20">
            <a href="{{ route('login') }}">Back to login</a>
          </p>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection


@extends('layouts.web.guest')

@section('content')

<section class="signin-page account">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="block text-center">
          <a class="logo" href="index.html">
            <img src="images/logo.png" alt="">
          </a>
          <h2 class="text-center">Create Your Account</h2>
          <form class="text-left clearfix" action="{{ route('register') }}" method="POST">
            @csrf
            <div class="form-group">
              <input type="text" name="first_name" value="{{ old('first_name') }}" class="form-control"  placeholder="First Name">
            </div>
            @error('first_name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="form-group">
              <input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control"  placeholder="Last Name">
            </div>
            <div class="form-group">
              <input type="email" name="email" value="{{ old('email') }}" class="form-control"  placeholder="Email">
            </div>
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="form-group">
              <input type="password" name="password" class="form-control"  placeholder="Password">
            </div>
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="form-group">
              <input type="password" name="password_confirmation" class="form-control"  placeholder="Confirm Password">
            </div>
            @error('password_confirmation')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="text-center">
              <button type="submit" class="btn btn-main text-center">Sign In</button>
            </div>
          </form>
          <p class="mt-20">Already hava an account ?<a href="login.html"> Login</a></p>
          <p><a href="forget-password.html"> Forgot your password?</a></p>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection

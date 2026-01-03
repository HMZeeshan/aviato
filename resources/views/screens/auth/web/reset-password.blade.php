@extends('layouts.web.guest')

@section('content')
<section class="signin-page account">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="block text-center">

          <h2>Reset Password</h2>

          <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group">
              <input type="email"
                     name="email"
                     class="form-control"
                     placeholder="Email"
                     value="{{ old('email') }}"
                     required>
            </div>

            <div class="form-group">
              <input type="password"
                     name="password"
                     class="form-control"
                     placeholder="New Password"
                     required>
            </div>

            <div class="form-group">
              <input type="password"
                     name="password_confirmation"
                     class="form-control"
                     placeholder="Confirm Password"
                     required>
            </div>

            @error('email')
              <span class="text-danger">{{ $message }}</span>
            @enderror

            @error('password')
              <span class="text-danger">{{ $message }}</span>
            @enderror

            <button type="submit" class="btn btn-main btn-block">
              Reset Password
            </button>
          </form>

        </div>
      </div>
    </div>
  </div>
</section>
@endsection

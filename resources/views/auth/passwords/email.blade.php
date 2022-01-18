@extends('frontOffice.layout.main')

@section("title","mot de passe oublier")

@section('content-wrapper')

<!-- Lost-password-Page -->
<div class="page-lost-password u-s-p-t-80">
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="page-lostpassword">
            <h2 class="account-h2 u-s-m-b-20">Forgot Password ?</h2>
            <h6 class="account-h6 u-s-m-b-30">Enter your email or username below and we will send you a link to reset your password.</h6>
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="w-50">
                    <div class="u-s-m-b-13">
                        <label for="email">Email
                            <span class="astk">*</span>
                        </label>
                        <input id="email" type="email" class="text-field form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="u-s-m-b-13">
                        <button type="submit" class="button button-outline-secondary">Get Reset Link</button>
                    </div>
                </div>
                <div class="page-anchor">
                    <a href="{{ route("login") }}">
                        <i class="fas fa-long-arrow-alt-left u-s-m-r-9"></i>Back to Login</a>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Lost-Password-Page /- -->
@endsection

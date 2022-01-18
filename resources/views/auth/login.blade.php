{{--@extends('layouts.app')--}}
@extends('frontOffice.layout.main')

@section('content-wrapper')



    <!-- Account-Page -->
<div class="page-account u-s-p-t-80">
    <div class="container">
        <div class="row">
            <!-- Login -->
            <div class="col-lg-6">
                <div class="login-wrapper">
                    <h2 class="account-h2 u-s-m-b-20">Login</h2>
                    <h6 class="account-h6 u-s-m-b-30">Welcome back! Sign in to your account.</h6>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="u-s-m-b-30">
                            <label for="user-name-email">Email
                                <span class="astk">*</span>
                            </label>
                            <input type="email" id="user-name-email" class="text-field form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="u-s-m-b-30">
                            <label for="login-password">Password
                                <span class="astk">*</span>
                            </label>
                            <input id="login-password" type="password" class="text-field form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="group-inline u-s-m-b-30">
                            <div class="group-1">
                                <input class="form-check-input" id="remember-me-token" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="label-text" for="remember-me-token">Remember me</label>
                            </div>
                            <div class="group-2 text-right">
                                <div class="page-anchor">
                                    <a href="lost-password.html">
                                    @if (Route::has('password.request'))
                                        <a class="fas fa-circle-o-notch u-s-m-r-9" href="{{ route('password.request') }}">
                                            Lost your password?
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="m-b-45">
                            <input type="submit" class="button button-outline-secondary w-100" value="Login">

                        </div>
                    </form>
                </div>
            </div>
            <!-- Login /- -->
            <!-- Register -->
            <div class="col-lg-6">
                <div class="reg-wrapper">
                    <h2 class="account-h2 u-s-m-b-20">Register</h2>
                    <h6 class="account-h6 u-s-m-b-30">Registering for this site allows you to access your order status and history.</h6>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="u-s-m-b-30">
                            <label for="user-name">Username
                                <span class="astk">*</span>
                            </label>
                            <input id="user-name" type="text" placeholder="Username" class="text-field form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus />

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="u-s-m-b-30">
                            <label for="email">Email
                                <span class="astk">*</span>
                            </label>
                            <input id="email" type="email" class="text-field form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="u-s-m-b-30">
                            <label for="password">Password
                                <span class="astk">*</span>
                            </label>
                            <input id="password" type="password" placeholder="Password" class="text-field form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="u-s-m-b-30">
                            <label for="password-confirm">Confirm Password
                                <span class="astk">*</span>
                            </label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="confirm password">
                        </div>
                        <div class="u-s-m-b-30">
                            <input type="checkbox" class="check-box" id="accept">
                            <label class="label-text no-color" for="accept">I’ve read and accept the
                                <a href="terms-and-conditions.html" class="u-c-brand">terms & conditions</a>
                            </label>
                        </div>
                        <div class="u-s-m-b-45">
                            <button type="submit" class="button button-primary w-100">Register</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Register /- -->
        </div>
    </div>
</div>
<!-- Account-Page /- -->
@endsection

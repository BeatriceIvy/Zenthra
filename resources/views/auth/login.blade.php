@extends('layouts.second-app')

@section('content')
    <section class="login">
        <div class="login-content">
            <h1 class="login-title">WELCOME TO</h1>
            <h1 class="hero-title primary">ZENTHRA</h1>
            <p class="hero-desc">Build your ultimate setup</p>
            <p class="hero-desc">with premium tech gear.</p>
            <div class="login-sp col">
                <div class="sp-login row">
                    <i class="fa-solid fa-check sp-icon"></i>
                    <div class="text-sp col">
                        <p class="head">Original Product</p>
                        <p class="body">100% original & official warranty</p>
                    </div>
                </div>
                <p class="secondary">|</p>
                <div class="sp-login row">
                    <i class="fa-solid fa-truck-fast sp-icon"></i>
                    <div class="text-sp col">
                        <p class="head">Fast Delivery</p>
                        <p class="body">Safe & reliable shipping </p>
                    </div>
                </div>
                <p class="secondary">|</p>
                <div class="sp-login">
                    <i class="fa-solid fa-headset sp-icon"></i>
                    <div class="text-sp col">
                        <p class="head">24/7 Support</p>
                        <p class="body">We are always here for you</p>
                    </div>
                </div>
            </div>
        </div>
        <form method="POST" action="{{ route('login') }}" class="login-form">
            @csrf
            <div class="header-login">
                <h1 class="form-title">Login</h1>
                <p>Welcome Back! Please Login To Your Account.</p>
            </div>

            <div class="form-group">

                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                    autocomplete="username" placeholder="Enter Your Email Here!">

                @error('email')
                    <span class="error-message" style="color: #ff4a4a; text-align: left; font-size: 14px;">{{ $message }}</span>
                @enderror

            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required autocomplete="current-password"
                    placeholder="Enter Your Password Here!">
                <span class="toggle-password">
                    <i class="fa-solid fa-eye"></i>
                </span>

                @error('password')
                    <span class="error-message" style="color: #ff4a4a; text-align: left; font-size: 14px;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-remember">
                <input type="checkbox" id="remember_me" name="remember">
                <label for="remember_me">Remember me</label>
                <a href="">Forgot Password?</a>
            </div>

            <div class="form-actions">
                <button type="submit">LOGIN</button>
            </div>

            <div class="line">
                <div class="garis"></div>
                <p>or continue with</p>
                <div class="garis"></div>
            </div>

            <div class="alt-login">
                <img src="{{ asset('assets/image/google.png') }}" alt="microsoft" class="login-logo">
                <img src="{{ asset('assets/image/fb.png') }}" alt="microsoft" class="login-logo">
                <img src="{{ asset('assets/image/ms.png') }}" alt="microsoft" class="login-logo">
                <img src="{{ asset('assets/image/apple.png') }}" alt="microsoft" class="login-logo">
            </div>

            <div class="link-to">
                <p>Dont have an account?</p>
                <a href="{{ route('register') }}">Create Account</a>
            </div>

        </form>
    </section>
@endsection
@extends('layouts.second-app')

@section('content')
    <section class="register">
        <div class="register-content">
            <h1 class="register-title">WELCOME TO</h1>
            <h1 class="hero-title primary">ZENTHRA</h1>
            <p class="hero-desc">Build your ultimate setup</p>
            <p class="hero-desc">with premium tech gear.</p>
            <div class="register-sp col">
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

        <form method="POST" action="{{ route('register') }}" class="register-form">
            @csrf

            <div class="header-register">
                <h1 class="form-title">Create Account</h1>
                <p>Join us! Fill in details to create account.</p>
            </div>

            <div class="form-group">
                <label for="name">Name</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Your Full Name">
                @error('name') 
                    <span style="color: #ff4d4d; font-size: 12px; margin-top: 5px;">{{ $message }}</span> 
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" placeholder="name@example.com">
                @error('email') 
                    <span style="color: #ff4d4d; font-size: 12px; margin-top: 5px;">{{ $message }}</span> 
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required autocomplete="new-password" placeholder="Min. 8 characters">
                @error('password') 
                    <span style="color: #ff4d4d; font-size: 12px; margin-top: 5px;">{{ $message }}</span> 
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Repeat your password">
                @error('password_confirmation') 
                    <span style="color: #ff4d4d; font-size: 12px; margin-top: 5px;">{{ $message }}</span> 
                @enderror
            </div>

            <div class="form-actions">
                <button type="submit">
                    REGISTER
                </button>
            </div>

            <div class="line">
                <div class="garis"></div>
                <p>or continue with</p>
                <div class="garis"></div>
            </div>

            <div class="alt-register">
                <img src="{{ asset('assets/image/google.png') }}" alt="microsoft" class="register-logo">
                <img src="{{ asset('assets/image/fb.png') }}" alt="microsoft" class="register-logo">
                <img src="{{ asset('assets/image/ms.png') }}" alt="microsoft" class="register-logo">
                <img src="{{ asset('assets/image/apple.png') }}" alt="microsoft" class="register-logo">
            </div>

            <div class="link-to">
                <p>Already registered?</p>
                <a href="{{ route('login') }}">Login here</a>
            </div>
        </form>
    </section>
@endsection
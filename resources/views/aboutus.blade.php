@push('style')
    <link rel="stylesheet" href="{{ asset('../public/assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('../public/assets/css/aboutus.css') }}">
@endpush

@extends ('layouts.app')

@section('title', 'About Us')

@section('content')

    <div class="hero-about">
        <p class="body accent">ABOUT US</p>
        <div class="hero-about-title">
            <h1>Built for</h1>
            <h1 class="primary">performances.</h1>
        </div>
        <div class="hero-about-title">
            <h1>Made for</h1>
            <h1 class="primary">gamers.</h1>
        </div>
        <p>Zenthra is more than just a store. We are a community of gamers, creator, and tech enthusiast who demand the best
            performance and quality in every hardware we provide.</p>
        <button class="btn-secondary white">Learn More About Us</button>
    </div>

    <div class="chart">
        <div class="box">
            <div class="sub-box">
                <div class="icon-box">
                    <img src="{{ asset('assets/image/icon/cart.png') }}" alt="cart" class="icon-img">
                </div>
                <div class="text-box">
                    <h1>10K+</h1>
                    <p class="sub">Happy Customers</p>
                    <p class="desc">Trusted by gamers worldwide</p>
                </div>
            </div>
            <hr>
            <div class="sub-box">
                <div class="icon-box">
                    <img src="{{ asset('assets/image/icon/cube.svg') }}" alt="icon" class="icon-img">
                </div>
                <div class="text-box">
                    <h1>500</h1>
                    <p class="sub">Happy Customers</p>
                    <p class="desc">Trusted by gamers worldwide</p>
                </div>
            </div>
            <hr>
            <div class="sub-box">
                <div class="icon-box">
                    <img src="{{ asset('assets/image/icon/trophy.svg') }}" alt="trophy" class="icon-img">
                </div>
                <div class="text-box">
                    <h1>99%</h1>
                    <p class="sub">Satisfaction Rate</p>
                    <p class="desc">Customer satisfaction is our top priority</p>
                </div>
            </div>
            <hr>
            <div class="sub-box">
                <div class="icon-box">
                    <img src="{{ asset('assets/image/icon/shield.svg') }}" alt="shield" class="icon-img">
                </div>
                <div class="text-box">
                    <h1>2+</h1>
                    <p class="sub">Years Experience</p>
                    <p class="desc">Delivering the best since 2024</p>
                </div>
            </div>
        </div>
    </div>

    <div class="about-container">
        <div class="abouts-card">
            <div class="about-text">
                <p class="body accent">OUR MISSION</p>
                <h2>Empowering Your</h2>
                <h2>Next Level</h2>
                <p>We believe that the right gear can elevate your game, boost your productivity, and unlock your true
                    potential. That's why we are commited to providing high-quality hardware with exceptional service.</p>
                <button class="btn-secondary white">Explore Our Products</button>
            </div>
            <div class="about-cards"></div>
        </div>
    </div>

@endsection
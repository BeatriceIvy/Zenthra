@extends('layouts.app')

@section('title', 'My Profile - Zenthra')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endpush

@section('content')
<div class="profile-container">
    
    <aside class="profile-sidebar">
        <a href="#" class="sidebar-link active">
            <i class="fa-solid fa-user"></i> Profile
        </a>
        <a href="#" class="sidebar-link">
            <i class="fa-solid fa-box"></i> My Orders
        </a>
        <a href="#" class="sidebar-link">
            <i class="fa-solid fa-heart"></i> Wishlist
        </a>
        <a href="#" class="sidebar-link">
            <i class="fa-solid fa-location-dot"></i> Addresses
        </a>
        <a href="#" class="sidebar-link">
            <i class="fa-solid fa-lock"></i> Change Password
        </a>
        
        <div class="help-box">
            <h4>NEED HELP?</h4>
            <p>Our support team is ready to help you</p>
            <a href="#" class="btn-help">Contact Support &gt;</a>
        </div>
    </aside>

    <main class="profile-main">
        
        <div>
            <h1>My Profile</h1>
            <p class="breadcrumb">Home &gt; Profile</p>
        </div>

        <div class="profile-header-card">
            <div style="display: flex; align-items: center; gap: 25px;">
                <div class="avatar-wrapper">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    <div class="btn-edit-avatar">
                        <i class="fa-solid fa-pen" style="color: #fff;"></i>
                    </div>
                </div>
                <div>
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <h2 style="font-size: 24px; font-weight: bold; color: #fff; margin: 0;">{{ Auth::user()->name }}</h2>
                        <span class="user-badge">Premium Member</span>
                    </div>
                    <p style="color: #94a3b8; font-size: 14px; margin: 4px 0 0 0;">{{ Auth::user()->email }}</p>
                    <p style="color: #64748b; font-size: 12px; margin: 10px 0 0 0;"><i class="fa-regular fa-calendar-days"></i> Member since: {{ Auth::user()->created_at->format('M d, Y') }}</p>
                </div>
            </div>

            <div class="profile-stats-container">
                <div class="stat-box">
                    <span class="num">12</span>
                    <span class="label">Orders</span>
                </div>
                <div class="stat-box">
                    <span class="num">8</span>
                    <span class="label">Wishlist</span>
                </div>
            </div>
        </div>

        <div class="profile-grid">
            
            <div class="profile-card">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                    <h3 class="card-title"><i class="fa-regular fa-id-card" style="color: #22d3ee; margin-right: 8px;"></i> Personal Information</h3>
                </div>

                @if (session('status') === 'profile-updated')
                    <p style="color: #2ecc71; font-size: 13px; margin-bottom: 15px;">Profile updated successfully!</p>
                @endif

                <form method="POST" action="{{ route('profile.update') }}" style="display: flex; flex-direction: column;">
                    @csrf
                    @method('patch')

                    <div class="form-group-profile">
                        <label>Full Name</label>
                        <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}" required>
                        @error('name') <span style="color: #ff4d4d; font-size: 12px;">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group-profile">
                        <label>Email Address</label>
                        <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}" required>
                        @error('email') <span style="color: #ff4d4d; font-size: 12px;">{{ $message }}</span> @enderror
                    </div>

                    <button type="submit" class="btn-profile-save" style="align-self: flex-end; margin-top: 10px;">Save Changes</button>
                </form>
            </div>

            <div class="profile-card" style="display: flex; flex-direction: column; justify-content: space-between;">
                <div>
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                        <h3 class="card-title"><i class="fa-solid fa-map-pin" style="color: #22d3ee; margin-right: 8px;"></i> Default Address</h3>
                        <a href="#" style="color: #22d3ee; font-size: 13px; text-decoration: none;">Manage Addresses &gt;</a>
                    </div>

                    <div class="address-inner-box">
                        <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px;">
                            <span style="font-weight: bold; color: #fff;">Home</span>
                            <span class="address-badge">Default</span>
                        </div>
                        <p style="color: #fff; font-weight: 500; font-size: 14px; margin-bottom: 6px;">{{ Auth::user()->name }}</p>
                        <p style="color: #94a3b8; font-size: 13px; line-height: 1.6; margin: 0;">Jl. Gaming No. 123, Jakarta Selatan, DKI Jakarta 12345, Indonesia</p>
                        <p style="color: #64748b; font-size: 13px; margin: 10px 0 0 0;"><i class="fa-solid fa-phone"></i> +62 812-3456-7890</p>
                    </div>
                </div>
            </div>

        </div>

        <div class="profile-card">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
                <h3 class="card-title"><i class="fa-solid fa-clock-rotate-left" style="color: #22d3ee; margin-right: 8px;"></i> Recent Orders</h3>
                <a href="#" style="color: #22d3ee; font-size: 13px; text-decoration: none;">View All Orders &gt;</a>
            </div>

            <div class="orders-list">
                <div class="order-item">
                    <div style="display: flex; align-items: center; gap: 15px;">
                        <div class="order-icon"><i class="fa-solid fa-laptop"></i></div>
                        <div>
                            <h4 style="font-size: 14px; font-weight: bold; color: #fff; margin: 0;">ASUS ROG Strix G16</h4>
                            <p style="color: #64748b; font-size: 11px; margin: 2px 0 0 0;">Order #ORD-2026-0012</p>
                        </div>
                    </div>
                    <div style="text-align: right;">
                        <span style="font-size: 14px; font-weight: bold; color: #22d3ee; display: block;">Rp 20.499.000</span>
                        <span class="status-delivered"><i class="fa-solid fa-circle-check"></i> Delivered</span>
                    </div>
                </div>

                <div class="order-item">
                    <div style="display: flex; align-items: center; gap: 15px;">
                        <div class="order-icon"><i class="fa-solid fa-microchip"></i></div>
                        <div>
                            <h4 style="font-size: 14px; font-weight: bold; color: #fff; margin: 0;">ASUS ROG RTX 4070 Ti</h4>
                            <p style="color: #64748b; font-size: 11px; margin: 2px 0 0 0;">Order #ORD-2026-0011</p>
                        </div>
                    </div>
                    <div style="text-align: right;">
                        <span style="font-size: 14px; font-weight: bold; color: #22d3ee; display: block;">Rp 12.999.000</span>
                        <span class="status-delivered"><i class="fa-solid fa-circle-check"></i> Delivered</span>
                    </div>
                </div>
            </div>
        </div>

    </main>
</div>
@endsection
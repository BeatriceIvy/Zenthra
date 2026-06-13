@extends('layouts.app')

@section('title', 'Checkout - Zenthra')

@section('content')
<div class="checkout-container">
    
    <div class="checkout-form-section">
        <h2 class="checkout-title"><i class="fa-solid fa-truck-ramp-box"></i> Shipping Details</h2>

        <form method="POST" action="{{ route('checkout.store') }}" class="checkout-form">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <input type="hidden" name="quantity" value="{{ $quantity }}">

            <div class="checkout-content">
                <label>Customer Name</label>
                <input type="text" value="{{ Auth::user()->name }}" disabled style="width: 100%; padding: 12px; background: rgba(0,0,0,0.5); border: 1px solid rgba(255,255,255,0.05); color: #64748b; border-radius: 8px; font-size: 14px;">
            </div>

            <div class="checkout-content">
                <label>Phone Number *</label>
                <input type="text" name="phone_number" placeholder="e.g. +62812345678" required style="width: 100%; padding: 12px; background: rgba(0,0,0,0.3); border: 1px solid rgba(255,255,255,0.1); color: #fff; border-radius: 8px; font-size: 14px;">
                @error('phone_number') <span class="danger">{{ $message }}</span> @enderror
            </div>

            <div class="checkout-content">
                <label>Full Shipping Address *</label>
                <textarea name="shipping_address" rows="4" placeholder="Enter street name, building number, city, and postal code..." required></textarea>
                @error('shipping_address') <span style="color: #ff4d4d; font-size: 12px;">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="btn-checkout">
                PLACE ORDER (Rp {{ number_format($totalPrice, 0, ',', '.') }})
            </button>
        </form>
    </div>

    <div class="checkout-summary-section">
        <h3 class="summary-title">Order Summary</h3>
        
        <div class="sum-product">
            <div class="sum-icon">
                <img src="{{ asset('storage/' .$product->image) }}" alt="{{ $product->name }}">
            </div>
            <div class="sum-text">
                <h4 class="sum-name">{{ $product->name }}</h4>
                <p class="sum-brand">Brand: {{ $product->brand }}</p>
                <p class="sum-qty">{{ $quantity }}x <span style="color: #22d3ee;">Rp {{ number_format($product->price, 0, ',', '.') }}</span></p>
            </div>
        </div>

        <div class="payment">
            <div class="payment-detail">
                <span class="kiri">Subtotal</span>
                <span style="color: #fff;">Rp {{ number_format($totalPrice, 0, ',', '.') }}</span>
            </div>
            <div class="payment-detail">
                <span class="kiri">Shipping Fee</span>
                <span style="color: #2ecc71; font-weight: 500;">FREE</span>
            </div>
            <div class="total">
                <span style="color: #fff;">Total Payment</span>
                <span style="color: #22d3ee;">Rp {{ number_format($totalPrice, 0, ',', '.') }}</span>
            </div>
        </div>
    </div>

</div>
@endsection
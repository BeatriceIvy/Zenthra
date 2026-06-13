@extends('layouts.app')

@section('content')
    <div class="container tengah col text-center" style="padding: 40px; min-height: 60vh; display: flex; flex-direction: column; justify-content: center; align-items: center;">
        
        <div class="dashboard-card" style="background: rgba(255, 255, 255, 0.05); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.1); padding: 40px; border-radius: 16px; max-w: 600px; width: 100%;">
            
            <h1 class="hero-title primary" style="font-size: 36px; margin-bottom: 10px; color: #fff;">
                Welcome Back, <span style="color: red;">{{ Auth::user()->name }}</span>!
            </h1>
            
            <p class="hero-desc" style="color: #ccc; margin-bottom: 30px;">
                You are successfully logged into your **ZENTHRA** administrator panel.
            </p>

            <div class="dashboard-actions" style="display: flex; gap: 15px; justify-content: center;">
                <a href="{{ route('products.index') }}" class="btn-save" style="text-decoration: none; padding: 12px 24px; background-color: red; color: white; border-radius: 8px; font-weight: bold; font-size: 14px;">
                    <i class="fa-solid fa-boxes-stacked"></i> Manage Products
                </a>
                
                <a href="/" class="btn-cancel" style="text-decoration: none; padding: 12px 24px; background: rgba(255,255,255,0.1); color: white; border-radius: 8px; font-weight: bold; font-size: 14px; border: 1px solid rgba(255,255,255,0.2);">
                    Logout
                </a>
            </div>

        </div>

    </div>
@endsection
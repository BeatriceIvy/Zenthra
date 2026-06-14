@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
<!-- 1. Hubungkan ke kerangka utama -->
@extends('layouts.app')

<!-- 2. Isi judul halaman -->
@section('title', 'Halaman Utama')

<!-- 3. Masukkan konten ke dalam @yield('content') yang ada di app.blade.php -->
@section('content')
    <!-- Memanggil Hero Section khusus untuk halaman Home -->
    @include('components.hero')
    <div class="container">
        <p class="body primary">EXPLORE CATEGORIES</p>
        <div class="row between">
            <p class="head-categories">Shop by Category</p>
            <button id="toogle-categories" class="mini-btn-secondary tengah primary accent-hover transition">VIEW ALL CATEGORIES <i class="fas fa-chevron-right ml-icon"></i></button>
        </div>
        <div id="less-categories" class="card-categories"> {{-- styling di category-card.css --}}
            @foreach ($topCategories as $category)
            <a href="{{ route('products.index', ['category' => $category->id]) }}" class="category-card-link" style="text-decoration: none;">
                @include('components.category-card', [
                    'name' => $category->name,
                    'image' => $category->image,
                    'slug' => $category->slug
                ])
            </a>
              @endforeach 
        </div>
        <div id="more-categories">
            <div class="card-categories">
            @foreach ($otherCategories as $category)
            <a href="{{ route('products.index', ['category' => $category->id]) }}" class="category-card-link" style="text-decoration: none;">
                @include('components.category-card', [
                    'name' => $category->name,
                    'image' => $category->image,
                    'slug' => $category->slug
                ])
            </a>
            @endforeach
            </div>
        </div>
        <p class="body primary">FEATURED PRODUCTS</p>
        <div class="row between">
            <p class="head-categories">Discover our top performance gear</p>
            <a href="{{ route('products.index') }}">
            <button id="toogle-categories" class="mini-btn-secondary tengah primary accent-hover transition">VIEW ALL PRODUCTS<i class="fas fa-chevron-right ml-icon"></i></button>
            </a>
        </div>
        <div class="card-products">
            @forelse ($products as $product)
            {{-- <a href="{{ route('products.index', ['category' => $category->id]) }}" class="category-card-link" style="text-decoration: none;"> --}}
                @include('components.product-card', [
                    'id' => $product->id,
                    'name' => $product->name,
                    'brand' => $product->brand,
                    'price' => $product->price,
                    'stock' => $product->stock,
                    'description' => $product->description,
                    'image' => asset('storage/' . $product->image),
                    'category' => $product->category->name
                ])
            @empty
                <p>No products available.</p>
            @endforelse
        </div>
    </div>
@endsection


@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/product.css') }}">
@endpush

@extends ('layouts.app')

@section('title', 'Product')

@section('content')
    <div class="hero-products">
        <div class="hero-text">
            <h1>PRODUCTS</h1>
            <p>Explore premium gaming and professional hardware for your ultimate setup.</p>
            <a href="{{ route('products.create') }}"><button class="btn-secondary primary accent-hover">ADD
                    PRODUCT</button></a>
        </div>
    </div>

    @if(request('search'))
        <div
            style="margin-bottom: 20px; display: flex; align-items: center; justify-content: space-between; background: rgba(34, 211, 238, 0.1); border: 1px solid rgba(34, 211, 238, 0.2); padding: 12px 20px; border-radius: 8px;">
            <span style="color: #fff; font-size: 14px;">
                Showing results for: <strong style="color: var(--accent-color, #22d3ee);">"{{ request('search') }}"</strong>
            </span>
            <a href="{{ route('products.index') }}" class="mini-btn-secondary"
                style="text-decoration: none; padding: 6px 12px; border-radius: 6px; font-size: 12px; display: flex; align-items: center; gap: 5px;">
                <i class="fa-solid fa-rotate-left"></i> Clear Search
            </a>
        </div>
    @endif

    <div class="product-container">
        <div class="category">
            <div class="header-category">
                <img src="{{ asset('../assets/image/icon/bars-filter.svg') }}" alt="Filter Icon" class="filter-icon">
                <p class="text-header">CATEGORIES</p>
            </div>
            <div class="content-category">
                <ul>
                    @foreach ($categories as $category)
                        <a href="{{ route('products.index', ['category' => $category->id]) }}">
                            <li {{ request('category') == $category->id ? 'active-category' : '' }}>
                                <p class="body">{{ $category->name }}</p>
                                <span class="count-badge">{{ $category->products_count }}</span>
                            </li>
                        </a>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="card-product">
            @forelse ($products as $product)
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


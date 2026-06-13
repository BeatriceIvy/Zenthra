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
                    'name' => $product->name,
                    'brand' => $product->brand,
                    // 'image' => $product->image,
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


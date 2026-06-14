<div class="product-card">
    @auth
    <div class="card-admin-badges">
        <a href="{{ route('products.edit', $id) }}" class="badge-icon edit-badge" title="Edit Product">
            <i class="fa-solid fa-pen"></i>
        </a>

        <form action="{{ route('products.destroy', $id) }}" method="POST" onsubmit="return confirm('Hapus {{ $name }} dari katalog demo Zenthra?')" class="delete-form">
            @csrf
            @method('DELETE')
            <button type="submit" class="badge-icon delete-badge" title="Delete Product">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </form>
    </div>
    @endauth
    <img src="{{ $image }}" alt="{{ $name }}" class="p-card-img">
    <div class="card-content">
        <h1 class="title">{{ $name }}</h1>
        <p class="price">Rp {{ number_format($price, 0, ',', '.') }},00</p>
        <p class="stock">{{ $stock }} Stock</p>
    </div>
    <div class="cta">
        @auth
        <a href="#" class="mini-btn-secondary primary" style="width: 40%; gap: 5px;"><i
                class="fa-solid fa-eye"></i>Quick View</a>
        <a href="{{ route('checkout.show', ['product_id' => $id, 'quantity' => 1]) }}"
            class="mini-btn-primary" style="width: 40%; gap: 5px;"><i class="fa-solid fa-shopping-cart"></i>Buy Now!</a>
        @else
        <a href="{{ route('login') }}" class="mini-btn-secondary full-width">Login To Buy!</a>
        @endauth
    </div>
</div>
<div class="product-card">
    @auth
    <div class="card-admin-badges">
        <a href="{{ route('products.edit', $product->id) }}" class="badge-icon edit-badge" title="Edit Product">
            <i class="fa-solid fa-pen"></i>
        </a>

        <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Hapus {{ $name }} dari katalog demo Zenthra?')" class="delete-form">
            @csrf
            @method('DELETE')
            <button type="submit" class="badge-icon delete-badge" title="Delete Product">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </form>
    </div>
    @endauth
    @if($stock <= 0)
        <div class="out-of-stock-badge">OUT OF STOCK</div>
    @endif

    <img src="{{ $image }}" alt="{{ $name }}" class="p-card-img {{ $stock <= 0 ? 'img-out-of-stock' : '' }}">
    
    <div class="card-content">
        <h1 class="title">{{ $name }}</h1>
        <p class="price">Rp {{ number_format($price, 0, ',', '.') }},00</p>
        
        @if($stock <= 0)
            <p class="stock" style="color: var(--danger-color); font-weight: 600;"><i class="fa-solid fa-circle-xmark"></i> Out of Stock</p>
        @else
            <p class="stock">{{ $stock }} Stock</p>
        @endif
    </div>

    <div class="cta">
        @auth
        <a href="javascript:void(0)" onclick="openQuickView('{{ $product->id }}')" class="mini-btn-secondary primary" style="width: 40%; gap: 5px;">
            <i class="fa-solid fa-eye"></i>Quick View
        </a>
        
        @if($stock <= 0)
            <button class="mini-btn-primary btn-disabled" style="width: 40%; gap: 5px;" disabled>
                <i class="fa-solid fa-ban"></i> Sold!
            </button>
        @else
            <a href="{{ route('checkout.show', ['product_id' => $product->id, 'quantity' => 1]) }}"
                class="mini-btn-primary" style="width: 40%; gap: 5px;"><i class="fa-solid fa-shopping-cart"></i>Buy Now!</a>
        @endif

        @else
        <a href="{{ route('login') }}" class="mini-btn-secondary full-width">Login To Buy!</a>
        @endauth
    </div>
</div>

@auth
<div id="quickview-modal-{{ $product->id }}" class="zv-modal-overlay" onclick="closeQuickView('{{ $product->id }}')">
    <div class="zv-modal-content" onclick="event.stopPropagation()">
        
        <button class="zv-modal-close" onclick="closeQuickView('{{ $product->id }}')">&times;</button>
        
        <div class="zv-modal-body">
            <div class="zv-modal-media">
                <img src="{{ $image }}" alt="{{ $name }}" class="{{ $stock <= 0 ? 'img-out-of-stock' : '' }}">
            </div>
            
            <div class="zv-modal-info">
                <span class="zv-modal-brand">{{ $brand ?? 'ZENTHRA PREMIUM' }}</span>
                <h2 class="zv-modal-title">{{ $name }}</h2>
                <div class="zv-modal-divider"></div>
                
                <p class="zv-modal-price">Rp {{ number_format($price, 0, ',', '.') }},00</p>
                
                @if($stock <= 0)
                    <span class="zv-modal-stock-badge" style="color: var(--danger-color);"><i class="fa-solid fa-circle-xmark"></i> Out of Stock</span>
                @else
                    <span class="zv-modal-stock-badge"><i class="fa-solid fa-box-open"></i> Ready: {{ $stock }} Pcs</span>
                @endif
                
                <div class="zv-modal-desc-box">
                    <h4>Description Product:</h4>
                    <p>{{ $description ?? 'No description available for this hardware component.' }}</p>
                </div>
                
                <div class="zv-modal-cta">
                    @if($stock <= 0)
                        <button class="mini-btn-primary zv-modal-btn btn-disabled" disabled style="width: 100%;">
                            <i class="fa-solid fa-ban"></i> PRODUCT UNAVAILABLE
                        </button>
                    @else
                        <a href="{{ route('checkout.show', ['product_id' => $product->id, 'quantity' => 1]) }}" class="mini-btn-primary zv-modal-btn">
                            <i class="fa-solid fa-shopping-cart"></i> INSTANT CHECKOUT
                        </a>
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>
@endauth
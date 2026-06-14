@extends('layouts.app')

@section('title', 'Edit Product - Zenthra')

@section('content')
<div style="max-width: 700px; margin: 40px auto; padding: 0 20px;">
    <div style="background: #111827; border: 1px solid rgba(255,255,255,0.1); padding: 35px; border-radius: 8px; box-shadow: 0 10px 25px rgba(34,211,238,0.15);">
        
        <h2 style="font-size: 22px; font-weight: 600; color: #fff; margin-bottom: 25px;">
            <i class="fa-solid fa-pen" style="color: #22d3ee; margin-right: 10px;"></i> Edit Component Hardware
        </h2>

        <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data" style="display: flex; flex-direction: column; gap: 20px;">
            @csrf
            @method('PUT') <div style="display: flex; flex-direction: column; gap: 6px;">
                <label style="font-size: 13px; color: #94a3b8;">Category</label>
                <select name="category_id" required style="width: 100%; padding: 12px; background: #0f172a; border: 1px solid rgba(255,255,255,0.1); color: #fff; border-radius: 6px;">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div style="display: flex; flex-direction: column; gap: 6px;">
                <label style="font-size: 13px; color: #94a3b8;">Component Name</label>
                <input type="text" name="name" value="{{ old('name', $product->name) }}" required style="width: 100%; padding: 12px; background: #0f172a; border: 1px solid rgba(255,255,255,0.1); color: #fff; border-radius: 6px;">
            </div>

            <div style="display: flex; flex-direction: column; gap: 6px;">
                <label style="font-size: 13px; color: #94a3b8;">Brand</label>
                <input type="text" name="brand" value="{{ old('brand', $product->brand) }}" required style="width: 100%; padding: 12px; background: #0f172a; border: 1px solid rgba(255,255,255,0.1); color: #fff; border-radius: 6px;">
            </div>

            <div style="display: flex; gap: 20px;">
                <div style="flex: 1; display: flex; flex-direction: column; gap: 6px;">
                    <label style="font-size: 13px; color: #94a3b8;">Price (Rp)</label>
                    <input type="number" name="price" value="{{ old('price', $product->price) }}" required style="width: 100%; padding: 12px; background: #0f172a; border: 1px solid rgba(255,255,255,0.1); color: #fff; border-radius: 6px;">
                </div>
                <div style="flex: 1; display: flex; flex-direction: column; gap: 6px;">
                    <label style="font-size: 13px; color: #94a3b8;">Stock</label>
                    <input type="number" name="stock" value="{{ old('stock', $product->stock) }}" required style="width: 100%; padding: 12px; background: #0f172a; border: 1px solid rgba(255,255,255,0.1); color: #fff; border-radius: 6px;">
                </div>
            </div>

            <div style="display: flex; flex-direction: column; gap: 6px;">
                <label style="font-size: 13px; color: #94a3b8;">Product Image (Kosongkan jika tidak ingin mengubah gambar)</label>
                <input type="file" name="image" style="width: 100%; padding: 12px; background: #0f172a; border: 1px solid rgba(255,255,255,0.1); color: #fff; border-radius: 6px;">
            </div>

            <div style="display: flex; flex-direction: column; gap: 6px;">
                <label style="font-size: 13px; color: #94a3b8;">Description</label>
                <textarea name="description" rows="4" required style="width: 100%; padding: 12px; background: #0f172a; border: 1px solid rgba(255,255,255,0.1); color: #fff; border-radius: 6px; resize: none;">{{ old('description', $product->description) }}</textarea>
            </div>

            <div style="display: flex; gap: 15px; margin-top: 10px;">
                <a href="{{ route('products.index') }}" style="flex: 1; text-align: center; padding: 14px; background: rgba(255,255,255,0.05); color: #94a3b8; border-radius: 6px; text-decoration: none; font-weight: bold; font-size: 14px; line-height: 20px;">CANCEL</a>
                <button type="submit" style="flex: 2; padding: 14px; background: var(--primary-color, #2563eb); border: none; color: #fff; font-weight: bold; border-radius: 6px; cursor: pointer; font-size: 14px;">SAVE CHANGES</button>
            </div>
        </form>

    </div>
</div>
@endsection
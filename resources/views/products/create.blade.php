@extends('layouts.app')

@section('content')
    <div class="container tengah col">

        <div class="form-header">
            <h2>Add New Premium Component</h2>
            <p>Fill in the details to add hardware components to Zenthra storage.</p>
        </div>

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="create-form">
            @csrf
            <h1>Product information</h1>
            <div class="form-create">
                <label for="category_id">Product Category</label>
                <select name="category_id" id="category_id" required>
                    <option value="">-- Select Category --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id') <span class="error-txt">{{ $message }}</span> @enderror
            </div>

            <div class="form-create">
                <label for="brand">Brand</label>
                <input type="text" id="brand" name="brand" value="{{ old('brand') }}"
                    placeholder="e.g. ASUS ROG, Logitech, Corsair" required>
                @error('brand') <span class="error-txt">{{ $message }}</span> @enderror
            </div>

            <div class="form-create">
                <label for="name">Product Name</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}"
                    placeholder="e.g. Mechanical Keyboard G715" required>
                @error('name') <span class="error-txt">{{ $message }}</span> @enderror
            </div>

            <div class="form-row-grid">
                <div class="form-create">
                    <label for="price">Price (IDR)</label>
                    <input type="number" id="price" name="price" value="{{ old('price') }}" placeholder="e.g. 1250000"
                        required>
                    @error('price') <span class="error-txt">{{ $message }}</span> @enderror
                </div>

                <div class="form-create">
                    <label for="stock">Initial Stock</label>
                    <input type="number" id="stock" name="stock" value="{{ old('stock') }}" placeholder="e.g. 50" required>
                    @error('stock') <span class="error-txt">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="form-create">
                <label for="description">Product Description</label>
                <textarea id="description" name="description" rows="5"
                    placeholder="Write full specifications of the gear here..." required>{{ old('description') }}</textarea>
                @error('description') <span class="error-txt">{{ $message }}</span> @enderror
            </div>

            <div class="form-create">
                <label for="image">Product Image Thumbnail</label>
                <input type="file" id="image" name="image" accept="image/*">
                @error('image') <span class="error-txt">{{ $message }}</span> @enderror
            </div>

            <div class="form-buttons">
                <a href="{{ route('products.index') }}" class="btn-cancel">Cancel</a>
                <button type="submit" class="btn-save">Save Component</button>
            </div>
        </form>

    </div>
@endsection
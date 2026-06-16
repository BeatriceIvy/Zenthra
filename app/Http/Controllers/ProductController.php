<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // WAJIB DIIMPORT: Untuk urusan hapus file gambar lama di storage

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // 1. Siapkan query dasar
        $productQuery = Product::with('category')->latest();

        // 2. LOGIKA SEARCH (Pastikan bagian ini sudah ada, bro!)
        if ($request->has('search') && $request->search != '') {
            $keyword = $request->search;
            $productQuery->where(function ($query) use ($keyword) {
                $query->where('name', 'like', "%" . $keyword . "%")
                    ->orWhere('brand', 'like', "%" . $keyword . "%");
            });
        }

        // 3. Saringan kategori bawaanmu
        if ($request->has('category') && $request->category != '') {
            $productQuery->where('category_id', $request->category);
        }

        // 4. Eksekusi query
        $products = $productQuery->get();
        $categories = Category::withCount('products')->get();

        return view('products.index', compact('products', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'brand' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'stock' => 'required|integer'
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        Product::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'brand' => $request->brand,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $imagePath,
            'stock' => $request->stock
        ]);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    /* =====================================================================
       TAMBAHAN FITUR BARU: EDIT, UPDATE, & DESTROY (FOR DEMO MODE)
       ===================================================================== */

    // 1. Menampilkan Form Edit Produk
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all(); // Diperlukan untuk isi dropdown kategori di form edit

        return view('products.edit', compact('product', 'categories'));
    }

    // 2. Memproses Update Data Produk ke Database
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'brand' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Boleh kosong saat edit jika gak mau ganti gambar
            'stock' => 'required|integer'
        ]);

        // Tampung data inputan form
        $data = [
            'category_id' => $request->category_id,
            'name' => $request->name,
            'brand' => $request->brand,
            'price' => $request->price,
            'description' => $request->description,
            'stock' => $request->stock
        ];

        // Jika user mengunggah gambar baru saat mengedit
        if ($request->hasFile('image')) {
            // Hapus gambar lama dari local storage biar folder gak kepenuhan sampah file
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }
            // Simpan gambar baru
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        // Eksekusi update ke tabel database
        $product->update($data);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    // 3. Memproses Hapus Data Produk (Delete)
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Hapus file gambar produk dari local storage sebelum baris datanya dihapus
        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }

        // Hapus data dari database
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}

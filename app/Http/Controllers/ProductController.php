<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // 1. Siapkan query dasar untuk mengambil produk beserta relasi kategorinya
        $productQuery = Product::with('category')->latest();

        // 2. JIKA DI URL ADA PARAMETER ?category=ID, MAKA SARING PRODUKNYA
        if ($request->has('category') && $request->category != '') {
            $productQuery->where('category_id', $request->category);
        }

        // 3. Eksekusi query produk setelah disaring
        $products = $productQuery->get();

        // 4. Ambil semua kategori untuk kebutuhan list di sidebar kiri
        $categories = Category::withCount('products')->get();

        // 5. Lempar datanya ke view
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
}

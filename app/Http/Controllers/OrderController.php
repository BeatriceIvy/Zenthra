<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // 1. Menampilkan Halaman Form Checkout Instan
    public function showCheckout(Request $request)
    {
        // Ambil ID produk dan quantity dari request klik tombol
        $productId = $request->query('product_id');
        $quantity = $request->query('quantity', 1);

        $product = Product::findOrFail($productId);

        // Validasi jika stok tidak cukup sebelum masuk halaman checkout
        if ($product->stock < $quantity) {
            return redirect()->back()->with('error', 'Stok produk tidak mencukupi!');
        }

        $totalPrice = $product->price * $quantity;

        return view('checkout.index', compact('product', 'quantity', 'totalPrice'));
    }

    // 2. Memproses Transaksi Masuk ke Database & Potong Stok
    public function placeOrder(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'shipping_address' => 'required|string|max:500',
            'phone_number' => 'required|string|max:20',
        ]);

        $product = Product::findOrFail($request->product_id);

        // Proteksi ganda: Cek stok sekali lagi sebelum disimpan
        if ($product->stock < $request->quantity) {
            return redirect()->back()->with('error', 'Maaf, stok tiba-tiba habis!');
        }

        // Generate Nomor Order Unik secara otomatis (Contoh: ZNTH-20260613-10293)
        $orderNumber = 'ZNTH-' . date('Ymd') . '-' . rand(10000, 99999);
        $totalPrice = $product->price * $request->quantity;

        // Simpan ke tabel orders
        $order = Order::create([
            'user_id' => Auth::id(),
            'order_number' => $orderNumber,
            'total_price' => $totalPrice,
            'shipping_address' => $request->shipping_address,
            'phone_number' => $request->phone_number,
            'status' => 'pending'
        ]);

        // Simpan ke tabel order_items
        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $product->id,
            'quantity' => $request->quantity,
            'price' => $product->price
        ]);

        // POTONG STOK PRODUK SECARA OTOMATIS
        $product->decrement('stock', $request->quantity);

        // Redirect ke halaman profil kustommu pada bagian Recent Orders
        return redirect()->route('profile.edit')->with('status', 'profile-updated'); 
    }
}
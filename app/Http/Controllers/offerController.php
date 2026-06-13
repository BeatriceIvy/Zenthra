<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;

class OfferController extends Controller
{
    public function index()
    {
        // Ambil data offer terakhir untuk ditampilkan di admin sebagai preview
        $currentOffer = Offer::latest()->first();
        return view('admin.offer-settings', compact('currentOffer'));
    }

    // Proses simpan data poster baru dari admin
    public function store(Request $request)
    {
        // 1. REQUEST VALIDATION (Sisi Backend - Syarat Dosen)
        $request->validate([
            'title'    => 'required|string|min:5|max:255',
            'description' => 'required|string|min:5|max:255',
            'image'    => 'required|image|mimes:jpeg,png,jpg|max:10000', // Maks 2MB
        ]);

        // 2. IMPLEMENTASI UPLOAD FILE (Syarat Dosen)
        $imageName = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            // Bikin nama file unik pake timestamp
            $imageName = time() . '_' . $file->getClientOriginalName();
            // Pindahkan file ke folder aset project kamu
            $file->move(public_path('assets/image'), $imageName);
        }

        // 3. Simpan ke Database
        Offer::create([
            'title'    => $request->title,
            'description' => $request->description,
            'image'    => $imageName,
        ]);

        return redirect()->back()->with('success', 'Offer Banner berhasil diperbarui!');
    }
}

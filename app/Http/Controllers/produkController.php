<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdukController extends Controller
{
    // method untuk menampilkan semua data produk
    public function index()
    {
        return response()->json(Produk::with('kategori')->get(), 200);
    }

    // method untuk menambah data produk
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'kategori_id' => 'required|exists:kategoris,id',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('produk_images', 'public');
        }

        $produk = Produk::create($validated);
        return response()->json($produk->load('kategori'), 201);
    }

    // method untuk menampilkan 1 data produk berdasarkan id
    public function show(Produk $produk)
    {
        return response()->json($produk->load('kategori'), 200);
    }

    // method untuk mengupdate 1 data produk berdasarkan id
    public function update(Request $request, Produk $produk)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'kategori_id' => 'required|exists:kategoris,id',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($produk->image) {
                \Storage::disk('public')->delete($produk->image);
            }
            $validated['image'] = $request->file('image')->store('produk_images', 'public');
        }

        $produk->update($validated);
        return response()->json($produk->load('kategori'), 200);
    }

    // method untuk menghapus 1 data produk berdasarkan id
    public function destroy(Produk $produk)
    {
        if ($produk->image) {
            \Storage::disk('public')->delete($produk->image);
        }
        $produk->delete();
        return response()->json(['message' => 'Produk deleted'], 200);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\ProdukView;
use App\Models\KategoriView;
use Illuminate\Http\Request;

class produkViewController extends Controller
{
    public function index()
    {
        $produks = ProdukView::with('kategoriView')->get();
        return view('produk.index', compact('produks'));
    }

    public function create()
    {
        $kategoris = KategoriView::all();
        return view('produk.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'kategori_id' => 'required|exists:kategori_views,id',
        ]);
        ProdukView::create($request->all());
        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $produk = ProdukView::findOrFail($id);
        $kategoris = KategoriView::all();
        return view('produk.edit', compact('produk', 'kategoris'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'kategori_id' => 'required|exists:kategori_views,id',
        ]);
        $produk = ProdukView::findOrFail($id);
        $produk->update($request->all());
        return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $produk = ProdukView::findOrFail($id);
        $produk->delete();
        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus.');
    }
}

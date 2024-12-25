<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KategoriController extends Controller
{
    // method untuk menampilkan semua data kategori
    public function index()
    {
        return response()->json(Kategori::all(), 200);
    }

    // method untuk menambah data kategori
    public function store(Request $request)
    {
        $validated = $request->validate(['name' => 'required|unique:kategoris']);
        $kategori = Kategori::create($validated);
        return response()->json($kategori, 201);
    }

    // method untuk menampilkan 1 data kategori berdasarkan id
    public function show(Kategori $kategori)
    {
        return response()->json($kategori, 200);
    }

    // method untuk mengupdate 1 data kategori berdasarkan id
    public function update(Request $request, Kategori $kategori)
    {
        $validated = $request->validate(['name' => 'required|unique:kategoris,name,' . $kategori->id]);
        $kategori->update($validated);
        return response()->json($kategori, 200);
    }

    // method untuk menghapus 1 data kategori berdasarkan id
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return response()->json(['message' => 'Kategori deleted'], 200);
    }
}

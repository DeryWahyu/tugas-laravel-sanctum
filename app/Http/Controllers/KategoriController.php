<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    // method untuk menampilkan semua data kategori
    public function index()
    {
        return response()->json(Kategori::all(), 200);
    }

    // method untuk menambah data kategori baru
    public function store(Request $request)
    {
        $validated = $request->validate(['name' => 'required|unique:kategoris']);
        $kategori = Kategori::create($validated);
        return response()->json($kategori, 201);
    }

    // method untuk menampilkan data kategori berdasarkan id
    public function show(Kategori $kategori)
    {
        return response()->json($kategori, 200);
    }

    // method untuk mengupdate data kategori
    public function update(Request $request, Kategori $kategori)
    {
        $validated = $request->validate(['name' => 'required|unique:kategoris,name,' . $kategori->id]);
        $kategori->update($validated);
        return response()->json($kategori, 200);
    }

    // method untuk menghapus data kategori
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return response()->json(['message' => 'Kategori deleted'], 200);
    }
}

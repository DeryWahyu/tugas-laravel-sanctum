<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriViewController;
use App\Http\Controllers\ProdukViewController;

Route::get('/', function () {
    return view('welcome');
});

// Routes untuk Kategori
Route::get('kategori', [KategoriViewController::class, 'index'])->name('kategori.index'); // Menampilkan semua kategori
Route::get('kategori/create', [KategoriViewController::class, 'create'])->name('kategori.create'); // Form tambah kategori
Route::post('kategori', [KategoriViewController::class, 'store'])->name('kategori.store'); // Simpan kategori baru
Route::get('kategori/{id}/edit', [KategoriViewController::class, 'edit'])->name('kategori.edit'); // Form edit kategori
Route::put('kategori/{id}', [KategoriViewController::class, 'update'])->name('kategori.update'); // Update kategori
Route::delete('kategori/{id}', [KategoriViewController::class, 'destroy'])->name('kategori.destroy'); // Hapus kategori

// Routes untuk Produk
Route::get('produk', [ProdukViewController::class, 'index'])->name('produk.index'); // Menampilkan semua produk
Route::get('produk/create', [ProdukViewController::class, 'create'])->name('produk.create'); // Form tambah produk
Route::post('produk', [ProdukViewController::class, 'store'])->name('produk.store'); // Simpan produk baru
Route::get('produk/{id}/edit', [ProdukViewController::class, 'edit'])->name('produk.edit'); // Form edit produk
Route::put('produk/{id}', [ProdukViewController::class, 'update'])->name('produk.update'); // Update produk
Route::delete('produk/{id}', [ProdukViewController::class, 'destroy'])->name('produk.destroy'); // Hapus produk

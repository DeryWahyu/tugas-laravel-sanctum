@extends('layout')

@section('content')
<div class="d-flex justify-content-between align-items-center">
    <h1>Produk</h1>
    <a href="{{ route('produk.create') }}" class="btn btn-primary">Tambah Produk</a>
</div>
@if(session('success'))
    <div class="alert alert-success mt-3">{{ session('success') }}</div>
@endif
<table class="table table-bordered mt-3">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($produks as $produk)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $produk->nama }}</td>
            <td>{{ $produk->harga }}</td>
            <td>{{ $produk->kategoriView->nama }}</td>
            <td>
                <a href="{{ route('produk.edit', $produk) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('produk.destroy', $produk) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

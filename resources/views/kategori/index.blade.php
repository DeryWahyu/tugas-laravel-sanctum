@extends('layout')

@section('content')
<div class="d-flex justify-content-between align-items-center">
    <h1>Kategori</h1>
    <a href="{{ route('kategori.create') }}" class="btn btn-primary">Tambah Kategori</a>
</div>
@if(session('success'))
    <div class="alert alert-success mt-3">{{ session('success') }}</div>
@endif
<table class="table table-bordered mt-3">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($kategoris as $kategori)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $kategori->nama }}</td>
            <td>
                <a href="{{ route('kategori.edit', $kategori) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('kategori.destroy', $kategori) }}" method="POST" class="d-inline">
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

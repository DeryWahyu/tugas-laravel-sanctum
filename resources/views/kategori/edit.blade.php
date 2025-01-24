@extends('layout')

@section('content')
<h1>Edit Kategori</h1>
<form action="{{ route('kategori.update', $kategori) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="nama" class="form-label">Nama Kategori</label>
        <input type="text" name="nama" id="nama" class="form-control" value="{{ $kategori->nama }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection

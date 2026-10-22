@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Tambah Produk</h2>
    <a class="btn btn-secondary" href="{{ route('products.index') }}">Kembali</a>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Perhatian!</strong> Ada beberapa masalah dengan inputan Anda.<br><br>
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card shadow-sm">
    <div class="card-body">
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Produk:</label>
                <input type="text" name="name" class="form-control" placeholder="Nama Produk" value="{{ old('name') }}">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Harga:</label>
                <input type="number" name="price" class="form-control" placeholder="Harga" value="{{ old('price') }}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi:</label>
                <textarea class="form-control" style="height:120px" name="description" placeholder="Deskripsi">{{ old('description') }}</textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Gambar Produk:</label>
                <input type="file" name="image" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection
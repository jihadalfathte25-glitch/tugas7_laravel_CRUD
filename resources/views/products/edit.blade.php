@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Edit Produk</h2>
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
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nama Produk:</label>
                <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="Nama Produk">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Harga:</label>
                <input type="number" name="price" value="{{ $product->price }}" class="form-control" placeholder="Harga">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi:</label>
                <textarea class="form-control" style="height:120px" name="description">{{ $product->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Gambar Produk:</label>
                <input type="file" name="image" class="form-control mb-2">
                @if($product->image)
                    <div class="mt-2">
                        <span class="d-block text-muted small mb-1">Gambar Saat Ini:</span>
                        <img src="/images/{{ $product->image }}" width="100px" class="rounded border">
                    </div>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
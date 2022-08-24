@extends('layouts.default')
@section('content')
<div class="card">
    <div class="card-header">
        <strong>Edit Barang</strong>
        <small>{{ $item->name }}</small>
    </div>
    <div class="card-body card-block">
        <form action="/product/{{$item->id}}" method="post">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="name">Nama Barang</label>
                <input type="text" name="name" value="{{ old('name') ? old('name') : $item->name }}" id="" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                    <div class="text-muted">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="type">Tipe Barang</label>
                <input type="text" name="type" value="{{ old('type') ? old('type') : $item->type }}" id="" class="form-control @error('type') is-invalid @enderror">
                @error('type')
                    <div class="text-muted">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Deskripsi Barang</label>
                <textarea name="description" id="" class="ckeditor @error('description') is-invalid @enderror">{{ old('description') ? old('description') : $item->description }}</textarea>
                @error('description')
                    <div class="text-muted">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="price">Harga Barang</label>
                <input type="number" name="price" value="{{ old('price') ? old('price') : $item->price }}" id="" class="form-control @error('price') is-invalid @enderror">
                @error('price')
                    <div class="text-muted">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="quantity">Jumlah Barang</label>
                <input type="number" name="quantity" value="{{ old('quantity') ? old('quantity') : $item->quantity }}" id="" class="form-control @error('quantity') is-invalid @enderror">
                @error('quantity')
                    <div class="text-muted">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <button class="btn-primary btn-block btn" tabindex="submit">Edit Barang</button>
            </div>
        </form>
    </div>
</div>
@endsection
@extends('layouts.default')
@section('content')
<div class="card">
    <div class="card-header">
        <strong>Edit Transaksi</strong>
        <small>{{ $item->uuid }}</small>
    </div>
    <div class="card-body card-block">
        <form action="/transaction/{{$item->id}}" method="post">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="name">Nama Pemesan</label>
                <input type="text" name="name" value="{{ old('name') ? old('name') : $item->name }}" id="" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                    <div class="text-muted">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" value="{{ old('email') ? old('email') : $item->email }}" id="" class="form-control @error('email') is-invalid @enderror">
                @error('email')
                    <div class="text-muted">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="no_hp">No HP</label>
                <input type="number" name="number" value="{{ old('number') ? old('number') : $item->number }}" id="" class="form-control @error('number') is-invalid @enderror">
                @error('number')
                    <div class="text-muted">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="address">Alamat</label>
                <textarea name="address" id="" class="ckeditor @error('address') is-invalid @enderror">{{ old('address') ? old('address') : $item->address }}</textarea>
                @error('address')
                    <div class="text-muted">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <button class="btn-primary btn-block btn" tabindex="submit">Edit Transaksi</button>
            </div>
        </form>
    </div>
</div>
@endsection
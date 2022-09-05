@extends('layouts.default')
@section('content')
<div class="card">
    <div class="card-header">
        <strong>Tambah Foto Barang</strong>
    </div>
    <div class="card-body card-block">
        <form action="/productgallery/" enctype="multipart/form-data" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Nama Barang</label>
                <select class="form-control  @error('product_id') is-invalid @enderror" id="" name="product_id">
                    @foreach($products as $p)
                        <option value="{{ $p->id }}"> {{ $p->name }} </option>
                    @endforeach
                </select>
                @error('product_id')
                    <div class="text-muted">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="photo">Photo Barang</label>
                <input type="file" name="photo" accept="image/*" value="{{ old('photo') }}" id="" class="form-control @error('photo') is-invalid @enderror">
                @error('photo')
                    <div class="text-muted">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group mb-2">
                <!-- <label for="is_default" class="form-control-label">Jadikan Default</label> -->
                <!-- <br/>   -->
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="check" id="inlineCheckbox1" value="1">
                    <label class="form-check-label" for="inlineCheckbox1">Jadikan Default </label>
                </div>
                <!-- <label>
                    <input type="radio" name="is_default" value="1"  class="form-control @error('is_default') is-invalid @enderror">
                Ya
                </label>
                &nbsp;
                <label>
                    <input type="radio" name="is_default" value="0"  class="form-control @error('is_default') is-invalid @enderror">
                Tidak
                </label> -->
                @error('is_default')
                    <div class="text-muted">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <button class="btn-primary btn-block btn" tabindex="submit">Tambah Foto Barang</button>
            </div>
        </form>
    </div>
</div>
@endsection
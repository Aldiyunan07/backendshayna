@extends('layouts.default')
@section('content')
    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="box-title">Daftar Foto Barang</div>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Barang</th>
                                        <th>Foto</th>
                                        <th>Default</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($items as $i)
                                    <tr>
                                        <td>{{ $i->id  }}</td>
                                        <td>{{ $i->product->name }}</td>
                                        <td>
                                            <img src="{{ url($i->photo) }}" alt="">
                                        </td>
                                        <td>
                                            {{ $i->is_default ? 'Ya' : 'Tidak' }}
                                        </td>
                                        <td>
                                            <form action="/productgallery/{{ $i->id }}" method="post" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td class="text-center p-5" colspan="6">Data Produk Kosong</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
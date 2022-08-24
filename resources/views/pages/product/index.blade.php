@extends('layouts.default')
@section('content')
    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="box-title">Daftar Barang</div>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Type</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($items as $i)
                                    <tr>
                                        <td>{{ $i->id  }}</td>
                                        <td>{{ $i->name }}</td>
                                        <td>{{ $i->type }}</td>
                                        <td>{{ $i->price }}</td>
                                        <td>{{ $i->quantity }}</td>
                                        <td>
                                        <a href="" class="btn btn-info btn-sm">
                                                <i class="fa fa-picture-o"></i>
                                            </a>
                                            <a href="/product/{{ $i->id }}/edit" class="btn btn-primary btn-sm">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <form action="/product/{{ $i->id }}" method="post" class="d-inline">
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
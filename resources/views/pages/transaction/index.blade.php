@extends('layouts.default')
@section('content')
    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="box-title">Daftar Transaksi Masuk</div>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Nomor</th>
                                        <th>Total Transaksi</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{ $no = 1; }}
                                    @forelse($item as $i)
                                    <tr>
                                        <td>{{ $no++  }}</td>
                                        <td>{{ $i->name }}</td>
                                        <td>{{ $i->email }}</td>
                                        <td>{{ $i->number }}</td>
                                        <td>{{ $i->rupiah($i->transaction_total) }}</td>
                                        <td>
                                            @if($i->transaction_status == 'PENDING')
                                                <span class="badge badge-info">
                                            @elseif($i->transaction_status == 'SUCCESS')
                                                <span class="badge badge-success">
                                            @elseif($i->transaction_status == 'FAILED')
                                                <span class="badge badge-danger">
                                            @else
                                                <span>

                                            @endif
                                                {{ $i->transaction_status }}
                                                </span>
                                        </td>
                                        <td>
                                        <a class="btn btn-sm btn-success" href="transaction/{{ $i->id }}/edit" > <i class="fa fa-pencil"></i> </a>
                                        <a
                                            href="#mymodal"
                                            data-remote="/transaction/{{ $i->id }}"
                                            data-toggle="modal"
                                            data-target="#mymodal"
                                            data-title="Detail Transaksi {{ $i->uuid }}"  
                                            class="btn btn-info btn-sm">
                                                <i class="fa fa-eye"></i>
                                            </a>

                                            <form action="/transaction/{{ $i->id }}" method="post" class="d-inline">
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
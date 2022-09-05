<table class="table table-bordered">
    <tr>
        <th> Nama </th>
        <td> {{ $items->name }}
    </tr>
    <tr>
        <th> Email </th>
        <td> {{ $items->email }}
    </tr>
    <tr>
        <th> Nomor </th>
        <td> {{ $items->number }}
    </tr>
    <tr>
        <th> Alamat </th>
        <td> {{ $items->address }}
    </tr>
    <tr>
        <th> Total Transaksi </th>
        <td> {{ $items->rupiah($items->transaction_total) }}
    </tr>
    <tr>
        <th> Status Transaksi </th>
        <td> {{ $items->transaction_status }}
    </tr>
    <tr>
        <th> Pembelian Produk </th>
        <td>
            <table class="table table-bordered w-100">
                <tr>
                    <th>Nama</th>
                    <th>Tipe</th>
                    <th>Harga</th>
                </tr>
                @foreach($items->detail as $i)
                    <tr>
                        <td> {{ $i->product->name }} </td>
                        <td> {{ $i->product->type }} </td>
                        <td> {{ $i->product->rupiah($i->product->price) }} </td>
                    </tr>
                @endforeach
            </table>
        </td>
    </tr>
</table>
<div class="row">
    <div class="col-4">
        <a href="{{ route('transaction.status', $i->id) }}?status=SUCCESS" class="btn btn-success btn-block"> 
            <i class="fa fa-check"></i> Set Sukses
        </a>
    </div>
    <div class="col-4">
        <a href="{{ route('transaction.status', $i->id) }}?status=FAILED" class="btn btn-danger btn-block"> 
            <i class="fa fa-times"></i> Set Gagal
        </a>
    </div>
    <div class="col-4">
        <a href="{{ route('transaction.status', $i->id) }}?status=PENDING" class="btn btn-info btn-block"> 
            <i class="fa fa-spinner"></i> Set Pending
        </a>
    </div>
</div>
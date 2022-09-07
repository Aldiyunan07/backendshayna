<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function get(Request $request, $id)
    {
        $product = Transaction::with(['details.product'])->find($id);
        if($product)
            return ResponseFormatter::success($product, 'Data Berhasil di ambil');
        else
            return ResponseFormatter::error(null, 'Data Transaksi Tidak Ada', 404);
    }
}

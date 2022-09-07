<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\CheckoutRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Gallery;
use App\Models\Detail;
use App\Models\Transaction;

class ChechkoutController extends Controller
{
    public function checkout(CheckoutRequest $request)
    {
        $data = $request->except('transaction_details');
        $data['uuid'] = 'TRX' . mt_rand(10000,99999) . mt_rand(100,999);
        $transaction = Transaction::create($data);

        foreach ($request->transaction_details as $product) 
        {
            $details = new Detail([
                'transaction_id' => $transaction->id,
                'products_id' => $product,
            ]);

            Product::find($product)->decrement('quantity');
            // $transaction->detail()->save($details);
        }

        $transaction->details()->save($details);

        return ResponseFormatter::success($transaction,'Data Berhasil Di Checkout',200);
    }    
}

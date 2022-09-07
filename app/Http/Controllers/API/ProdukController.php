<?php

namespace App\Http\Controllers\API;
use App\Models\Produk;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $name = $request->input('name');
        $slug = $request->input('slug');
        $type = $request->input('type');
        $price_from = $request->input('price_from');
        $price_to = $request->input('price_to');

        if($slug)
        {
            // $product = Product::with('gallery')->find($id);
            $product = Product::with('gallery')->where('slug',$slug)->first();

            if($product)
                return ResponseFormatter::success($product,'Data Produk Berhasil diambil', 200);
            else 
                return ResponseFormatter::error(null,'Data produk tidak ada', 404);
        }
        
        if($id)
        {
            $product = Product::with('gallery')->find($id);

            if($product)
                return ResponseFormatter::success($product,'Data Produk Berhasil diambil', 200);
            else 
                return ResponseFormatter::error(null,'Data produk tidak ada', 404);
        }

        $product = Product::with('gallery');
        
        if($name)
            $product->where('name','like','%' . $name . '%');
        
        if($type)
            $product->where('type', 'like', '%' . $type . '%');
        
        if($price_from)
            $product->where('price', '>=' , $price_from );
        
        if($price_to)
            $product->where('price', '<=' , $price_to);
        
        return ResponseFormatter::success(
            $product->paginate($limit),
            'Data List Produk Berhasil diambil',
            200
        );
        
    }    
}

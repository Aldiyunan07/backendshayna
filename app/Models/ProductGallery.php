<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ProductGallery extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'products_id' , 'photo' , 'is_default'
    ];


    public function product()
    {
        return $this->belongsTo(Produk::class);
    }


}

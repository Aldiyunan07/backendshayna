<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Detail extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded;

    public function product()
    {
        return $this->belongsTo(Product::class, 'products_id','id');
    }

    public function Transaction()
    {
        return $this->belongTo(Transaction::class ,'transaction_id','id');
    }
}

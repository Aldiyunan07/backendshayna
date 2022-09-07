<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;

    use HasFactory;
    protected $guarded;


    public function details()
    {
        return $this->hasMany(Detail::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

    function rupiah($value){
        return "Rp " . number_format($value,2,",",".");
    }
}

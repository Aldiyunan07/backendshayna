<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{

    use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'slug',
        'type',
        'description',
        'price',
        'quantity'
    ];


    public function gallery()
    {
        return $this->hasMany(Gallery::class);
    }

    public function detail()
    {
        return $this->hasMany(Detail::class);
    }

    public function transaction(){
        return $this->hasMany(Transaction::class);
    }

    function rupiah($value){
        return "Rp " . number_format($value,2,",",".");
    }
}


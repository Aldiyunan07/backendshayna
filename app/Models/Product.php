<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{

    use SoftDeletes;
    use HasFactory;
    protected $guarded;


    public function gallery()
    {
        return $this->hasMany(Gallery::class);
    }

    public function detail()
    {
        return $this->hasMany(Detail::class);
    }
}


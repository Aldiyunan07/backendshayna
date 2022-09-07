<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'id',
        'product_id',
        'photo',
        'is_default'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getPhotoAttribute($value)
    {
        return url('storage/' . $value);
    }
}

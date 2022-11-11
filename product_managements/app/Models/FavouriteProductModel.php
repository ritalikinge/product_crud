<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavouriteProductModel extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'favourite_products';
    protected $fillable = [
        'product_id',
        'created_at'
    ];
}

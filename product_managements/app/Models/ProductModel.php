<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'products';
    protected $fillable = [
        'product_name',
        'image',
        'created_at',
        'updated_at'
    ];

}

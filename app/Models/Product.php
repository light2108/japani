<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table='products';
    protected $fillable=[
        'category_id',
        'typeproduct_id',
        'name',
        'description',
        'image',
        'price',
        'rating',
        'sell',
        'sku',
        'gtin',
        'trademark',
        'specification',
        'origin',
        'kg',
        'status'
    ];
}

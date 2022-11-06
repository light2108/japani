<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeProduct extends Model
{
    use HasFactory;
    protected $table='type_products';
    protected $fillable=[
        'name',
        'category_id',
        'status'
    ];
    public function product(){
        return $this->hasMany('App\Models\Product', 'typeproduct_id', 'id');
    }

}

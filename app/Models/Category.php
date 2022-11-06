<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table='categories';
    protected $fillable=[
        'name',
        'image',
        'status'
    ];
    public function typeproduct(){
        return $this->hasMany('App\Models\TypeProduct', 'category_id', 'id');
    }
    public function product(){
        return $this->hasMany('App\Models\Product', 'category_id', 'id');
    }
}

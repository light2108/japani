<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordered extends Model
{
    use HasFactory;
    protected $table='ordereds';
    protected $fillable=[
        'cart_id',
        'name',
        'mobile',
        'email',
        'city',
        'district',
        'ward',
        'address',
        'note',
    ];
}

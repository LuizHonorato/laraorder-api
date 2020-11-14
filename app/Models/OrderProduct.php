<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $table = 'order_products';

    public $timestamps = false;

    protected $fillable = [
        'order_id', 'qty', 'product', 'price'
    ];

    function order()
    {
        return $this->belongsTo('App\Models\Order');
    }



    protected $casts = [
        'price' => 'float'
    ];
}

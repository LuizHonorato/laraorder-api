<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use function PHPUnit\Framework\isEmpty;

class Order extends Model
{
    protected $table = 'orders';

    public $timestamps = false;

    protected $fillable = [
      'customer_name', 'created_at',
    ];

    function products()
    {
        return $this->hasMany('App\Models\OrderProduct');
    }

    public function getTotalAttribute()
    {
        return $this->products->reduce(fn($total, $product) => $total + $product->qty * $product->price);
    }

    protected $appends = [
      'total'
    ];

    protected $dates = [
        'created_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

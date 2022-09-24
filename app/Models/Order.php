<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
use HasFactory;

    protected $fillable = [
        'user_id', 'order_number' , 'payment_method', 'status', 'payment_status', 'shipping_price'
    ];



    public function user()
    {
        return $this->belongsTo(User::class)->withDefault([
            'name' => 'Guest Customer'
        ]);
    }



    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_items', 'order_id', 'product_id', 'id', 'id')
            ->using(OrderItem::class)
            ->as('order_item')
            ->withPivot([
                'product_name', 'price', 'quantity', 'options',
        ]);
    }



    public function items()
    {
        return $this->hasMany(OrderItem::class , 'order_id', 'id');
    }



    public function addresses()
    {
        return $this->hasMany(OrderAddress::class , 'order_id', 'id');
    }
}
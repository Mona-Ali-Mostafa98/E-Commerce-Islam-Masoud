<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
use HasFactory;

    protected $fillable = [
        'user_id', 'order_number' , 'user_address_id',
        'payment_method', 'status',
        'payment_status', 'total_price'
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
                'product_name', 'product_price', 'quantity',
        ]);
    }



    public function items()
    {
        return $this->hasMany(OrderItem::class , 'order_id', 'id');
    }



    // public function addresses()
    // {
    //     return $this->hasMany(OrderAddress::class , 'order_id', 'id');
    // }

    public function address()
    {
        return $this->hasOne(OrderAddress::class, 'order_id', 'id')->withDefault();
    }
}
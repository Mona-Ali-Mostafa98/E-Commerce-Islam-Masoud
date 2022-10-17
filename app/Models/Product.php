<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    use HasFactory , HasTranslations;

    protected $fillable = [
        'product_name' , 'product_model' , 'product_price' ,
        'best_selling' , 'product_details' , 'product_description' , 'status' ,

        'slug' , 'rating' , 'options' ,

    ];

    public $translatable = [
        'product_name' , 'product_model' ,
        'product_details' , 'product_description'
    ];


    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    public function comments(){
        return $this->hasMany(CommentOnProduct::class, 'product_id', 'id');
    }


    // this relation to get data of orders stored in order_product table
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_items')
            ->using(OrderItem::class)
            ->withPivot([
                'product_name', 'price', 'quantity', 'options'
            ]);
    }


   public function products()
    {
        return $this->belongsToMany(Order::class, 'order_items', 'order_id', 'product_id', 'id', 'id')
            ->using(OrderItem::class)
            ->as('order_item')
            ->withPivot([
                'product_name', 'price', 'quantity', 'options',
        ]);
    }


    public function favoriteUsers()
    {
        return $this->belongsToMany(User::class, 'wishlists');
    }

}
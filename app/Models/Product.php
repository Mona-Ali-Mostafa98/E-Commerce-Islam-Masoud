<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory , HasTranslations;

    protected $fillable = [
        'product_name' , 'product_model' , 'product_price' ,
        'best_selling' , 'product_details' , 'status' ,

        'slug' , 'rating' , 'options' ,

    ];

    public $translatable = [
        'product_name' , 'product_model' ,
        'product_details' ,
    ];



    // Accessors
    // $product->image_url
    public function getImageUrlAttribute()
    {
        if (!$this->image) {
            return 'https://www.incathlab.com/images/products/default_product.png';
        }
        if (Str::startsWith($this->image, ['http://', 'https://'])) {
            return $this->image;
        }
        return asset('storage/' . $this->image);
    }


}
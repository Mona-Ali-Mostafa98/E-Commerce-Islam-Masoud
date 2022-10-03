<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ProductImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id' , 'product_image' ,

    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id')->withDefault();
    }



    // Accessors
    // $product->product_image_url
    public function getProductImageUrlAttribute()
    {
        if (!$this->product_image) {
            return 'https://www.incathlab.com/images/products/default_product.png';
        }
        if (Str::startsWith($this->product_image, ['http://', 'https://'])) {
            return $this->product_image;
        }
        return url('storage/product_images/' . $this->product_image);
    }

}
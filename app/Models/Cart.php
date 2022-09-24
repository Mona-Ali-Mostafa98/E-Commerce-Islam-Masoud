<?php

namespace App\Models;

use App\Observers\CartObserver;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class Cart extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $fillable = [
        'cookie_id', 'user_id', 'product_id', 'quantity', 'options',
    ];


    public function user()
    {
        return $this->belongsTo(User::class , 'user_id', 'id')->withDefault([
            'name' => 'Anonymous',
        ]);
    }

    public function product()
    {
        return $this->belongsTo(Product::class , 'product_id', 'id');
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderAddress extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'order_id', 'address',
        'city', 'state', 'full_address',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class , 'order_id')->withDefault();
    }


}

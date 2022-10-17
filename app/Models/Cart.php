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

    //---------- Start Change default of model -------------
    public $incrementing = false; //Id

    public $timestamps = false;

    protected $keyType = 'string';

    protected $primaryKey = ['id', 'product_id'];
    //------------------------- End ------------------------

    protected $fillable = [
        'id', 'user_id', 'product_id', 'quantity',
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


    // this function used to allow to make two primary key not only one
    // we can also separate it in trait and use it here

    protected function setKeysForSaveQuery($query)
    {
        $query->where([
            'id'=> $this->attributes['id'],
            'product_id'=> $this->attributes['product_id']
        ]);

        return $query;
    }


}

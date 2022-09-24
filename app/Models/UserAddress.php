<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'full_address' ,
        'city' , 'state' ,
    ];


    public function user()
    {
        return $this->belongsTo(Admin::class , 'user_id', 'id')->withDefault();
    }

}
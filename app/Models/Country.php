<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'country_name', 'country_code' , 'calling_code' , 'country_flag' , 'maximum_mobile_number'
    ];
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Service extends Model
{
    use HasFactory , HasTranslations;

    protected $fillable = [
        'title', 'sup_title', 'description' , 'image' , 'status'
    ];

    public $translatable = [
        'title' , 'sup_title' , 'description'
    ];

}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Setting extends Model
{
    use HasFactory , HasTranslations;

    // protected $guarded = [];

    protected $fillable = [
        'website_logo', 'website_name' ,
        'mobile_number' , 'email' ,
        'currency_code', 'tax' ,
        'about_services' , 'about_offers' , 'privacy_policy',
        'about_us_description' , 'about_us_image' ,
        'our_vision', 'our_message' , 'our_goals' ,
        'facebook_url' , 'twitter_url' , 'instagram_url',
        'linkedin_url' , 'whatsapp_number' , 'copy_footer_text' ,
    ];

    public $translatable = [
        'website_name' ,
        'currency_code',
        'about_services' ,
        'about_offers' ,
        'privacy_policy',
        'about_us_description' ,
        'our_vision', 'our_message' , 'our_goals' ,
        'copy_footer_text' ,
    ];

}
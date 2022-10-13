<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Blog extends Model
{
    use HasFactory , HasTranslations;

    protected $fillable = [
        'cover_image', 'image', 'title', 'brief_about_blog',
        'description', 'views_number', 'admin_id',

    ];

    public $translatable = [
        'title' , 'description' , 'brief_about_blog'
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class , 'admin_id', 'id')->withDefault([
            'name' => 'Website Owner'
        ]);
    }


    public function incrementViewsNumber() {
        $this->views_number++;
        return $this->save();
    }

}

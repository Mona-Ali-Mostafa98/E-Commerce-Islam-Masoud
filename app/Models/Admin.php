<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Translatable\HasTranslations;


class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable , HasRoles ;

    protected $fillable = [
        'name', 'email' , 'password' , 'mobile' , 'image' , 'roles_name', 'status'
    ];

    public $guard_name = 'admin';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    protected $casts = [
        'email_verified_at' => 'datetime',
        'roles_name' => 'array',
    ];

    public function blogs(){
        return $this->hasMany(Blog::class, 'admin_id', 'id');
    }


    public function products(){
        return $this->hasMany(Product::class, 'product_id', 'id');
    }

}

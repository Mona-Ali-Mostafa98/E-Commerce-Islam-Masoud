<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'full_name',
        'email',
        'mobile_number',
        'password',
        'profile_image',
        'receive_notifications',
        'status',
        'mobile_verified',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public function orders(){
        return $this->hasMany(Order::class, 'order_id', 'id');
    }



    public function addresses(){
        return $this->hasMany(UserAddress::class, 'user_id', 'id');
    }


        public function favorite_products()
    {
        return $this->belongsToMany(Product::class, 'wishlists')->withTimestamps();
    }

    // Accessors
    // $product->image_url
    public function getImageUrlAttribute()
    {
        if (!$this->profile_image) {
            return 'https://media.istockphoto.com/vectors/default-profile-picture-avatar-photo-placeholder-vector-illustration-vector-id1223671392?k=20&m=1223671392&s=612x612&w=0&h=lGpj2vWAI3WUT1JeJWm1PRoHT3V15_1pdcTn2szdwQ0=';
        }
        if (Str::startsWith($this->profile_image, ['http://', 'https://'])) {
            return $this->profile_image;
        }
        return url('storage/' . $this->profile_image);
    }


    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

}
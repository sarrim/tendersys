<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\BusinessProfile;
use App\Models\Product;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'clear_password',
        'user_type',
        'user_status',
        'contact',
        'address',
        'email_verified_at',
        'remember_token',
        'welcome_amount',
        'available_amount',
        'profile_picture',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function business(){
        return $this->belongsTo(BusinessProfile::class);
    }

    public function products(){
        return $this->hasMany(Product::class, 'user_id', 'id');
    }

    public function orders(){
        return $this->hasMany(Order::class, 'vendor_id', 'id');
    }
}

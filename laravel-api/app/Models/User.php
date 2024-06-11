<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        "address",
        "phone_number",
        "bank_info",
        "role_id",
        'password',
    ];
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function cart()
    {
        return $this->hasMany(Cart::class);
    }
    public function order()
    {
        return $this->hasMany(Order::class);
    }
    public function payment()
    {
        return $this->hasMany(Payment::class);
    }
    public function cupon_usage()
    {
        return $this->hasMany(Coupon_usage::class);
    }
    public function wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }
    public function purchase()
    {
        return $this->hasMany(Purchase::class);
    }
    public function product_reviews() {
        return $this->hasMany(Product_Reviews::class);
    }

    public function photo()
    {
        return $this->morphOne(Photo::class, 'imageable');
    }

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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}

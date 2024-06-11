<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cupon extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function cupon_usege() {
        return $this->hasMany(Coupon_usage::class);
    }
}

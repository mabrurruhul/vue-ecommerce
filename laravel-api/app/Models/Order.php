<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function order_items(){
        return $this->hasMany(Order_item::class);
    }
    public function payment(){
        return $this->hasone(Payment::class);
    }
    public function shipment(){
        return $this->hasOne(Shipment::class);
    }
}

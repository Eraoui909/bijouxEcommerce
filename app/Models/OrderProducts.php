<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderProducts extends Model
{
    protected $fillable = ["order_id","product_id","quantity"];


    public function order(){
        return $this->belongsTo(Order::class);
    }
}

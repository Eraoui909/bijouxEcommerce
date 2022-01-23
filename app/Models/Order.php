<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ["total","tax","shipping"];

    protected $guarded = ["id"];


    public function orderProducts(){

        return $this->hasMany(OrderProducts::class,"order_id");
    }

    public function billing(){
        return $this->hasOne(Billing::class,'order_id');
    }
}

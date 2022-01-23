<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    protected $fillable = ["first_name","last_name","country","street_address","second_street_address","city","country","zip","email","phone","notes","order_id"];

    protected $guarded = ["id"];

    public function order(){

        return $this->belongsTo(Order::class);
    }
}

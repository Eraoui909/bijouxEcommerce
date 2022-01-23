<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favory extends Model
{
    protected $fillable = [
        "user_id",
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, "product_favory", "favory_id", "product_id");
    }

}

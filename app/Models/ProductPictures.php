<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductPictures extends Model
{
    protected $fillable = ["name"];

    protected $guarded = ["id","product_id"];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}

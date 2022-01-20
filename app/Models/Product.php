<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ["name","description","price","discount","stock","visibility","published_by","category_id"];

    protected $guarded = ["id"];

    public function scopeVisible($query){
        return $query->where("visibility",1);
    }

    public function pictures(){
        return $this->hasMany(ProductPictures::class,"product_id");
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function publishedBy(){
        return $this->belongsTo(Manager::class);
    }
}

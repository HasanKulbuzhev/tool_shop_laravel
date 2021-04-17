<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function categories()
    {
        return $this->belongsToMany(Category::class,'categories_products');
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
//этот метод нужен,чтобы показывать количество каждого товара в корзине
    public function get_total_price()
    {
        if ($this->pivot->count > 1){
            return $this->pivot->count * $this->price;
        }
        return $this->price;
    }
//
}

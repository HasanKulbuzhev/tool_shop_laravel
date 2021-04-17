<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['code','name','description','image','category_id','hit','new','recommend'];
    public function getCategory()
    {
        return Category::find($this->category_id);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);

    }

    public function getPriceForCount()
    {
        if(!is_null($this->pivot)){
            return $this->pivot->count * $this->price;
        }
       return $this->price;
    }

    public function isHit(){
        return $this->hit === 1;
    }
    public function isNew(){
        return $this->new === 1;
    }
    public function isRecommend(){
        return $this->recommend === 1;
    }
}

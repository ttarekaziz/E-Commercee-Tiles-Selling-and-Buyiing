<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  
    protected $fillable=['category_id','name','price','description','product_image','length','width'];

    public function category()
    {
     return $this->belongsTo(Category::class);
    }
}

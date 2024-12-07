<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\brand;

class Product extends Model
{
    protected $fillable = ['title','description','price','image','category_id','brand_id'];
    use HasFactory;

    public function categories(){
        return $this->belongsTo(Category::class,'category_id');
    }

    public function brands()
    {
        return $this->belongsTo(brand::class, 'brand_id');
    }
}

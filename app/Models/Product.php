<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Elasticquent\ElasticquentTrait;

class Product extends Model
{
    use HasFactory, SoftDeletes,ElasticquentTrait;

    public $fillable = ['name','description'];
    // định nghĩa quan hệ giữa 2 bảng sản phầm và danh mục
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(Product_image::class);
    }
}

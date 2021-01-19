<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'sub_category_id', 'name', 'size', 'color', 'price', 'description', 'product_slug', 'quantity', 'image_1', 'image_2', 'image_3', 'stock_status'];

    protected $table = "products";

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}

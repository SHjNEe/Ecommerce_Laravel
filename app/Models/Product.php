<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';


    protected $fillable = [
        'category_id', 'name', 'slug', 'brand',
        'small_description', 'original_price', 'selling_price', 'quantity', 'trending', 'status', 'meta_title', 'meta_keyword', 'meta_description'
    ];

    public function productImages()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}

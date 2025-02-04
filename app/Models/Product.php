<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Features;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Product extends Model implements HasMedia
{
    use HasFactory, HasTranslations, InteractsWithMedia;
    const STOCK = ['in stock', 'out of stock'];
    public $guarded = [];
    public $table = 'products';
    public $timestamps = true;
    public $translatable = [
        'title',
        'desc',
        'long_desc',
    ];
    public function features()
    {
        return $this->hasMany(Features::class, 'prod_id');
    }
    public function articles()
    {
        return $this->hasMany(Article::class, 'prod_id');
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_category', 'product_id', 'category_id');
    }

    public function types()
    {
        return $this->belongsToMany(Type::class, 'product_type', 'product_id', 'type_id');
    }

    public function technologies()
    {
        return $this->belongsToMany(Technology::class, 'product_technology', 'product_id', 'technology_id');
    }

    public function productUsings()
    {
        return $this->belongsToMany(ProductUsing::class, 'product_using', 'product_id', 'using_id');
    }
}

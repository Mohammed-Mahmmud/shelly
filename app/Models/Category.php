<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Solution;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Category extends Model implements HasMedia
{
    use HasFactory, HasTranslations, InteractsWithMedia;
    public $guarded = [];
    public $table = 'categories';
    public $timestamps = true;
    public $translatable = [
        'title',
        'desc'
    ];
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
    public function solutions()
    {
        return $this->belongsToMany(Solution::class);
    }
}

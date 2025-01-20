<?php

namespace App\Models;

use App\Models\Features;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Product extends Model implements HasMedia
{
    use HasFactory, HasTranslations, InteractsWithMedia;
    public $guarded = [];
    public $table = 'products';
    public $timestamp = true;
    public $translatable = [
        'title',
        'desc',
        'long_desc',
        'stock',
        'price'
    ];
    public function features()
    {
        return $this->hasMany(Features::class, 'prod_id');
    }
    public function articles()
    {
        return $this->hasMany(Article::class, 'prod_id');
    }
}

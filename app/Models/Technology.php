<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Technology extends Model implements HasMedia
{
    use HasFactory, HasTranslations, InteractsWithMedia;

    public $guarded = [];
    public $table = 'technologies';
    public $timestamps = true;
    public $translatable = [
        'title',
    ];
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}

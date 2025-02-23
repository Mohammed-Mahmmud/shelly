<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class ProductUsing extends Model implements HasMedia
{
    use HasFactory, HasTranslations, InteractsWithMedia;
    use HasFactory;
    public $guarded = [];
    public $table = 'usings';
    public $timestamps = true;
    public $translatable = [
        'title',
    ];
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}

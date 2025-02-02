<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Translatable\HasTranslations;

class ProductUsing extends Model
{
    use HasFactory, HasTranslations;
    use HasFactory;
    public $guarded = [];
    public $table = 'usings';
    public $timestamps = true;
    public $translatable = [
        'title',
        'icon'
    ];
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}

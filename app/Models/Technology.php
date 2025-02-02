<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Technology extends Model
{
    use HasFactory, HasTranslations;
    public $guarded = [];
    public $table = 'technologies';
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

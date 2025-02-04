<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Article extends Model
{
    use HasFactory, HasTranslations;
    public $guarded = [];
    public $table = 'articles';
    public $timestamps = true;
    public $translatable = [
        'title',
        'desc',
    ];
    public function product()
    {
        return $this->belongsTo(Product::class, 'prod_id');
    }
}

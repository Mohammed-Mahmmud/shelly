<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Solution;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Type extends Model
{
    use HasFactory, HasTranslations;
    public $guarded = [];
    public $table = 'types';
    public $timestamps = true;
    public $translatable = [
        'title',
        'icon'
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

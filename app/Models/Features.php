<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Features extends Model
{
    use HasFactory, HasTranslations;
    public $guarded = [];
    public $translatable = [
        'title'
    ];
    public $table = 'features';
    public $timestamps = true;
    public function product()
    {
        return $this->belongsTo(Product::class, 'prod_id');
    }
}

<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    public $guarded = [];
    public $table = 'articles';
    public $timestamp = true;
    public $translatable = [
        'title',
        'desc',
    ];
    public function product()
    {
        return $this->belongsTo(Product::class, 'prod_id');
    }
}

<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Features extends Model
{
    use HasFactory;
    public $guarded = [];
    public $translatable = [
        'title',
        'desc',
    ];
    public $table = 'features';
    public $timestamps = true;
    public function product()
    {
        return $this->belongsTo(Product::class, 'prod_id');
    }
}

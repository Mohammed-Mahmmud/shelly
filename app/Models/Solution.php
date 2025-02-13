<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Solution extends Model implements HasMedia
{
    use HasFactory, HasTranslations, InteractsWithMedia;
    const STATUS = ['active', 'not active'];
    public $guarded = [];
    public $table = 'solutions';
    public $timestamps = true;
    public $translatable = [
        'title',
        'desc',
    ];
    public function types()
    {
        return $this->belongsToMany(Type::class, 'solution_type', 'solution_id', 'type_id');
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'solution_category', 'solution_id', 'category_id');
    }
    public function scopeActive($query)
    {
        return $query->where('status', 'Active');
    }
}

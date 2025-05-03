<?php

namespace App\Models;

use App\Models\Page;
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
        'name'
    ];
    public function types()
    {
        return $this->belongsToMany(Type::class, 'solution_type', 'solution_id', 'type_id');
    }

    public function pages()
    {
        return $this->belongsToMany(Page::class, 'solution_page', 'solution_id', 'page_id');
    }
    public function scopeActive($query)
    {
        return $query->where('status', 'Active');
    }
}

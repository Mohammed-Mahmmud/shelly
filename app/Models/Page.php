<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;
use  App\Models\Solution;
class Page extends Model implements HasMedia
{
    use HasFactory, HasTranslations, InteractsWithMedia;
    const STATUS = ['active', 'not active'];
    public $guarded = [];
    public $table = 'pages';
    public $timestamps = true;
    public $translatable = [
        'title',
        'desc',
        'name',

    ];
    public function scopeActive($query)
    {
        return $query->where('status', 'Active');
    }
    
    public function parents()
    {
        return $this->belongsTo(Page::class, 'parent_id', 'id');
    }
    public function solutions()
    {
        return $this->belongsToMany(Solution::class, 'solution_page', 'page_id', 'solution_id');
    }
    public function childes()
    {
        return $this->hasMany(Page::class, 'parent_id', 'id');
    }
    public function scopeParents($query)
    {
        return $query->whereNull('parent_id');
    }
    public function scopeChildes($query)
    {
        return $query->whereNotNull('parent_id');
    }
}

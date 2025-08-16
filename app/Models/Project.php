<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Project extends Model implements HasMedia
{
    use HasFactory, HasTranslations, InteractsWithMedia;
    const STATUS = ['active', 'not active'];
    public $guarded = [];
    public $table = 'projects';
    public $timestamps = true;
    public $translatable = [
        'title',
        'desc',
    ];
    public function scopeActive($query)
    {
        return $query->where('status', 'Active');
    }
    public function pages()
    {
        return $this->belongsTo(Page::class, 'page_id', 'id');
    }
}

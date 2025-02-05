<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

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
}

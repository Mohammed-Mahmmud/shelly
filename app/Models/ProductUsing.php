<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductUsing extends Model
{
    use HasFactory;
    public $guarded = [];
    public $table = 'product-using';
    public $timestamp = true;
}

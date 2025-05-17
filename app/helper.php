<?php

use App\Models\Page;

if (!function_exists('getSolutionsCategories')) {
    function getSolutionsCategories()
    {
        $parent = Page::where('slug', 'solutions')->first();
        return Page::active()->where('parent_id', $parent->id)->get();
    }
}
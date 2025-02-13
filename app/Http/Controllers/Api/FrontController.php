<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProjectResource;
use App\Models\Product;
use App\Models\Project;

class FrontController extends Controller
{
    public function allProducts()
    {
        return ProductResource::collection(
            Product::paginate(10)
        );
    }

    public function singleProduct($id)
    {
        return ProductResource::make(
            Product::findOrFail($id)
        );
    }
    public function allSolutions($category)
    {
        dd($category);
        return ProductResource::collection(
            Product::paginate(10)
        );
    }
    public function singleProject($slug)
    {
        return ProjectResource::make(
            Project::where('slug', $slug)->active()->first()
        );
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;

class FrontController extends Controller
{
    public function index()
    {
        return ProductResource::collection(
            Product::paginate(10)
        );
    }

    public function show($id)
    {
        return ProductResource::make(
            Product::findOrFail($id)
        );
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\NavbarResources;
use App\Http\Resources\PagesResources;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductsFilterResource;
use App\Http\Resources\ProductsResource;
use App\Http\Resources\ProjectResource;
use App\Models\Category;
use App\Models\Page;
use App\Models\Product;
use App\Models\ProductUsing;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function products(Request $request, $id = null)
    {
        if ($id) {
            return ProductResource::make(Product::findOrFail($id));
        }

        // Start building the query
        $query = Product::query();

        // Handle Sorting
        if ($request->has('sort_by')) {
            switch ($request->sort_by) {
                case 'title-ascending':
                    $query->orderBy('title', 'asc');
                    break;
                case 'title-descending':
                    $query->orderBy('title', 'desc');
                    break;
                case 'best-selling':
                    $query->where('stock', 'out of stock');
                    break;
                case 'price-ascending':
                    $query->orderBy('price', 'asc');
                    break;
                case 'price-descending':
                    $query->orderBy('price', 'desc');
                    break;
                case 'created-ascending':
                    $query->orderBy('created_at', 'asc');
                    break;
                case 'created-descending':
                    $query->orderBy('created_at', 'desc');
                    break;
                case 'manual':
                    $query->orderBy('id', 'desc');
                    break;
                default:
                    $query->orderBy('id', 'asc');
                    break;
            }
        }

        if ($request->has('price_from') || $request->has('price_to')) {
            $priceFrom = $request->get('price_from');
            $priceTo = $request->get('price_to');
            if ($priceFrom && $priceTo) {
                $query->whereBetween('price', [$priceFrom, $priceTo]);
            } elseif ($priceFrom) {
                $query->where('price', '>=', $priceFrom);
            } elseif ($priceTo) {
                $query->where('price', '<=', $priceTo);
            }
        }

        if ($request->has('filter_by_types')) {
            $types = $request->get('filter_by_types');
            if (is_string($types)) {
                $types = explode(',', $types); // Convert string to array if needed
            }

            foreach ($types as $typeId) {
                $query->whereHas('types', function ($q) use ($typeId) {
                    $q->where('types.id', $typeId); // Ensure each type is present
                });
            }
        }

        if ($request->has('filter_by_technologies')) {
            $technologies = $request->get('filter_by_technologies');
            if (is_string($technologies)) {
                $technologies = explode(',', $technologies);
            }

            foreach ($technologies as $techId) {
                $query->whereHas('technologies', function ($q) use ($techId) {
                    $q->where('technologies.id', $techId); // Ensure each technology is present
                });
            }
        }

        if ($request->has('filter_by_using')) {
            $using = $request->get('filter_by_using');
            if (is_string($using)) {
                $using = explode(',', $using);
            }

            foreach ($using as $usingId) {
                $query->whereHas('productUsings', function ($q) use ($usingId) {
                    $q->where('product_usings.id', $usingId); // Ensure each usage is present
                });
            }
        }

        if ($request->has('filter_by_categories')) {
            $categories = $request->get('filter_by_categories');
            if (is_string($categories)) {
                $categories = explode(',', $categories);
            }

            foreach ($categories as $categoryId) {
                $query->whereHas('categories', function ($q) use ($categoryId) {
                    $q->where('categories.id', $categoryId); // Ensure each category is present
                });
            }
        }
        // Paginate the results with 30 products per page
        $products = $query->paginate(30);
        return response()->json([
            'success' => true,
            'products' => ProductsResource::collection($products)->response()->getData(true),
            'filter' => ProductsFilterResource::make($products),
        ]);
        // return ProductsResource::collection($products);
    }
    public function productsFilter()
    {
        return response()->json([
            'success' => true,
            'data' => [
                'filter_by_types' => Type::all()->map(function ($data) {
                    return [
                        'id' => $data->id,
                        'title' => $data->getTranslation('title', app()->getLocale()),
                    ];
                }),
                'filter_by_technologies' => Technology::all()->map(function ($data) {
                    return [
                        'id' => $data->id,
                        'title' => $data->getTranslation('title', app()->getLocale()),
                    ];
                }),
                'filter_by_using' => ProductUsing::all()->map(function ($data) {
                    return [
                        'id' => $data->id,
                        'title' => $data->getTranslation('title', app()->getLocale()),
                    ];
                }),
                'filter_by_categories' => Category::all()->map(function ($data) {
                    return [
                        'id' => $data->id,
                        'title' => $data->getTranslation('title', app()->getLocale()),
                    ];
                }),
                'sort_by' => ['title-ascending', 'title-descending', 'best-selling', 'price-ascending', 'price-descending', 'created-ascending', 'created-descending', 'manual'],
            ],
        ]);
    }
    public function solutions($id)
    {
        dd($id);
        return ProductResource::collection(
            Product::paginate(10)
        );
    }
    public function projects($slug)
    {
        return ProjectResource::make(
            Project::where('slug', $slug)->active()->first()
        );
    }
    public function navbar()
    {
        $pages = Page::active()->parents()->with('childes')->get();
        return NavbarResources::collection($pages);
    }
    public function pages($id = null)
    {
        if (isset($id)) {
            $page = Page::findOrFail($id);
            return PagesResources::make($page);
        } else {
            $pages = Page::active()->parents()->with('childes')->get();
            return PagesResources::collection($pages);
        }
    }
}

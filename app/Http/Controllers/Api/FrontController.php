<?php

namespace App\Http\Controllers\Api;

use App\Models\Page;
use App\Models\Type;
use App\Models\Product;
use App\Models\Project;
use App\Models\Category;
use App\Models\Solution;
use App\Models\Technology;
use App\Models\ProductUsing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\HomeResource;
use App\Http\Resources\PagesResources;
use App\Http\Resources\NavbarResources;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProjectResource;
use App\Http\Resources\ProductsResource;
use App\Http\Resources\ProjectsResource;
use App\Http\Resources\SolutionResource;
use App\Http\Resources\ProjectsResources;
use App\Http\Resources\ProductsFilterResource;

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
    public function solutions(Page $page)
    {
        return SolutionResource::collection($page->solutions);
    }
    public function projects($id = null)
    {
        if (isset($id)) {
        $projects = Project::where('page_id', $id)->active()->paginate(30);
        } else {
            $projects = Project::active()->get();
        }
        return response()->json([
            'success' => true,
            'projects' => ProjectsResources::collection($projects)->response()->getData(true),
        ]);
    }
    public function project($id)
    {
        return ProjectResource::make(
            Project::where('id', $id)->active()->first()
        );
    }
    public function navbar()
    {
        $pages = Page::active()->parents()->with('childes')->get();
        return NavbarResources::make($pages);
    }
    public function home($slug = null)
    {
        if ($slug) {
            $page = Page::active()->where('slug', $slug)->first();
            return PagesResources::make($page);
        }
        return response()->json([
            'success' => false,
            'message' => 'Page not found',
        ], 404);
    }
    public function getHomePage()
    {
        try {
            $page = Page::active()->where('slug', 'home')->first();
            return HomeResource::make($page);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Page not found',
            ], 404);
        }
    }
}

<?php

namespace App\Http\Controllers\Store;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\SubCategory;
use App\Product;

class HomeController extends Controller
{
    protected $subcategories;
    protected $grouped;

    public function __construct()
    {
        // Get all caetgories and subcategories.
        $this->subcategories = SubCategory::with('category')->latest()->get();

        // Group them by category_id.
        $this->grouped = $this->subcategories->groupBy('category_id');
    }

    // Get products in a category.
    public function getCategory($category)
    {
        // Get category.
        if(is_null(Category::with('products')->where('slug', '=', $category)->first())){

            return view('user.categoryNothing')->withCategory($category);
        }else{
            $category = Category::with('products')->where('slug', '=', $category)->first();
            $products = $category->products()->latest()->paginate(12);

            // $half = floor($products->count() / 3);
            $chunks = $products->chunk(3);

            // Data to return to view.
            $data = [
                'grouped' => $this->grouped,
                'category' => $category,
                'products' => $products,
                'chunks' => $chunks
            ];
            return view('user.category')->withData($data);
        }
        
    }

    public function getSeller($category)
    {
        // Get category.
        if(is_null(Category::with('products')->where('slug', '=', $category)->first())){

            return view('user.categoryNothing')->withCategory($category);
        }else{
            $category = Category::with('products')->where('slug', '=', $category)->first();
            $products = $category->products()->latest()->paginate(12);

            // $half = floor($products->count() / 3);
            $chunks = $products->chunk(3);

            // Data to return to view.
            $data = [
                'grouped' => $this->grouped,
                'category' => $category,
                'products' => $products,
                'chunks' => $chunks
            ];
            return view('user.category')->withData($data);
        }
        
    }

    // Get products in a subcategory.
    public function getSubCategory($category, $subcategory)
    {
        // Get Category ID
        $category_id = SubCategory::getCategoryId($category);

        // Get suncategory.
        if(is_null(SubCategory::with('products', 'category')->where('slug', '=', $subcategory)
        ->where('category_id', '=', $category_id)
        ->first())){

            return view('user.categoryNothing')->withCategory($category);
        }else{
        $subcategory = SubCategory::with('products', 'category')->where('slug', '=', $subcategory)
                                                                ->where('category_id', '=', $category_id)
                                                                ->first();
        $products = $subcategory->products()->latest()->paginate(12);

        // $half = floor($products->count() / 3);
        $chunks = $products->chunk(3);

        // Data to return to view.
        $data = [
            'grouped' => $this->grouped,
            'category' => $subcategory,
            'products' => $products,
            'chunks' => $chunks
        ];

        return view('user.category')->withData($data);
        }
    }

    // Get seach results.
    public function getSearchResults()
    {
        // Grab search query text from query string.
        $query = (isset($_GET['q'])) ? $_GET['q'] : '';

        // Search for product using query.
        $products = Product::with('images', 'category', 'subcategory')->where('name', 'sounds like', $query)
                                            ->orWhere('name', 'LIKE', '%' . $query . '%')
                                            ->orWhere('description', 'sounds like', $query)
                                            ->orWhereHas('category', function($q) use ($query) {
                                                $q->where('name', 'LIKE', '%' . $query . '%');
                                            })
                                            ->orWhereHas('subcategory', function($q) use ($query) {
                                                $q->where('name', 'LIKE', '%' . $query . '%');
                                            })
                                            ->paginate(12)->appends(request()->except('page'));

        // $half = floor($products->count() / 3);
        $chunks = $products->chunk(3);

        // Data to return to view.
        $data = [
            'query' => $query,
            'grouped' => $this->grouped,
            'products' => $products,
            'chunks' => $chunks
        ];

        return view('store.products.search')->withData($data);
    }
}

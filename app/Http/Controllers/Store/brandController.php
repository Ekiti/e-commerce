<?php

namespace App\Http\Controllers\Store;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\SubCategory;
use App\Product;

class brandController extends Controller
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
}

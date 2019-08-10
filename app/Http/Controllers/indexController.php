<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\SubCategory;
use App\Product;
use App\Banner;
use Cart;

class indexController extends Controller
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

    public function getIndex()
    {
        // Get products for new arrival section.
        // Get eight (8) random most recent products from the database.
        $newArrivalProducts = Product::with('images')->paginate(4);
        $count = ($newArrivalProducts->count() > 7) ? 8 : $newArrivalProducts->count();
        $newArrivalRandomProducts = $newArrivalProducts->random($count);
        $banner = Banner::all();

        // foreach ($newArrivalRandomProducts as $product) {
        //     dd($product->images);
        // }


        // Data to return with view.
        $data = [
            'grouped' => $this->grouped,
            'newArrivalRandomProducts' => $newArrivalProducts,
            'banner' => $banner
        ];

        return view('user.index ')->withData($data);
    }

    // Get product detail
    public function getProductDetail($slug, $sku)
    {
        // Get product.
        $product = Product::with(['category', 'subcategory', 'sizes', 'images'])->where('sku', '=', $sku)
                                ->where('slug', '=', $slug)->first();
        $relatedProducts = Product::where('category_id', '=', $product->category_id)
                                    ->where('sku', '!=', $sku)->take(4)->get();

        // Data to return to view.
        $data = [
            'grouped' => $this->grouped,
            'product' => $product,
            'relatedProducts' => $relatedProducts
        ];
        return view('user.productDetails')->withData($data);
    }

    // Get products in a category.
    public function getCategory($category)
    {
        // Get category.
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

        return view('store.categories.category')->withData($data);
    }

    // Get products in a subcategory.
    public function getSubCategory($category, $subcategory)
    {
        // Get Category ID
        $category_id = SubCategory::getCategoryId($category);

        // Get suncategory.
        $subcategory = SubCategory::with('products', 'category')->where('slug', '=', $subcategory)
                                                                ->where('category_id', '=', $category_id)
                                                                ->first();
        $products = $subcategory->products()->latest()->paginate(12);

        // $half = floor($products->count() / 3);
        $chunks = $products->chunk(3);

        // Data to return to view.
        $data = [
            'grouped' => $this->grouped,
            'subcategory' => $subcategory,
            'products' => $products,
            'chunks' => $chunks
        ];

        return view('store.categories.subcategory')->withData($data);
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

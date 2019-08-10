<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\SubCategory;
use App\Size;
use Illuminate\Support\Facades\Auth;
use Session;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all products
        // Get all products
        $products = Product::with(['category', 'subcategory', 'sizes', 'images'])->latest()->where('admin_id', '=', Auth::guard('admin')->user()->id)->paginate(20);

        // Counter for serial number.
        $counter = 1;

        // Data to return to view
        $data = [
            'counter' => $counter,
            'products' => $products
        ];

        return view('admin.products.index')->withData($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Create new product instance.
        $product = new Product();

        // Get product sku
        $sku = $product->sku();

        // Create labels array.
        $labelsArray = [
            '' => 'Select a label',
            'New' => 'New',
            'Hot' => 'Hot'
        ];

        // Categories araay.
        $categories = Category::with('subcategories')->get();
        $grouped = $categories->groupBy('name');
        $categoriesArray = ['' => 'Select a Category'];

        foreach ($grouped as $categories) { // Loop through grouped collection
            foreach ($categories as $category) { // Get categories and loop through them
                $categoriesArray[$category->name] = []; // Set category name as index - assign to empty array
                foreach ($category->subcategories as $subcategory) { // Loop through category subcategories
                    $categoriesArray[$subcategory->category->name][$subcategory->id] = $subcategory->name; // Set index of array to subcategory id and value to subcategory name
                }
            }
        }

        // Sizes array.
        $sizes = Size::all();
        $sizesArray = [];

        foreach ($sizes as $size) {
            $sizesArray[$size->id] = $size->name;
        }

        $data = [
            'categoriesArray' => $categoriesArray,
            'sizesArray' => $sizesArray,
            'labelsArray' => $labelsArray,
            'sku' => $sku
        ];
        
        return view('admin.products.create')->withData($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Define validation rules.
        $validationRules = [
            'name' => 'required|max:255',
            'price' => 'required|integer',
            'quantity' => 'required|integer',
            'description' => 'required',
            'sku' => 'required|size:20',
            'sub_category_id' => 'required|integer',
            'sizes' => 'required'
        ];

        // Define custom validation messages.
        $validationCustomMessages = [
            'name.required' => 'Product name is required',
            'sub_category_id.required' => 'Choose a category',
            'sub_category_id.integer' => 'Oops. Something went wrong with the category',
            'sku.required' => 'Oops. Something went wrong with the SKU',
            'sku.size' => 'Oops. Something went wrong with the SKU',
            'sizes.required' => 'Select sizes for this product'
        ];

        $this->validate($request, $validationRules, $validationCustomMessages);

        // Create new product instance.
        $product = new Product();

        // Assign form data to product properties.
        $product->name = ucwords(strtolower($request->name));
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $product->discount = $request->discount;
        $product->label = $request->label;
        $product->sku = $request->sku;
        $product->slug = $product->slug();
        $product->admin_id = Auth::guard('admin')->user()->id;


        // Get category ID
        $category_id = SubCategory::with('category')->find($request->sub_category_id)->category->id;

        $product->category_id = $category_id;
        $product->sub_category_id = $request->sub_category_id;

        $product->save();

        // Sync the products and the tags together
        // 'False' parameter lets the sync function not override
        // tag_id in the product_id table
        $product->sizes()->sync($request->sizes, false);

         // Flash success message to session
        Session::flash('message.level', 'success');
        Session::flash('message.content', 'Product created successfully! You can now add product images.');
        Session::flash('message.icon', 'check');

        return redirect()->route('images.create', $product->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Create new product instance.
        $product = Product::find($id);

        // Get product sku
        $sku = $product->sku;

        // Create labels array.
        $labelsArray = [
            '' => 'Select a label',
            'New' => 'New',
            'Hot' => 'Hot'
        ];

        // Categories araay.
        $categories = Category::with('subcategories')->get();
        $grouped = $categories->groupBy('name');
        $categoriesArray = ['' => 'Select a Category'];

        foreach ($grouped as $categories) { // Loop through grouped collection
            foreach ($categories as $category) { // Get categories and loop through them
                $categoriesArray[$category->name] = []; // Set category name as index - assign to empty array
                foreach ($category->subcategories as $subcategory) { // Loop through category subcategories
                    $categoriesArray[$subcategory->category->name][$subcategory->id] = $subcategory->name; // Set index of array to subcategory id and value to subcategory name
                }
            }
        }

        // Sizes array.
        $sizes = Size::all();
        $sizesArray = [];

        foreach ($sizes as $size) {
            $sizesArray[$size->id] = $size->name;
        }

        $data = [
            'product' => $product,
            'categoriesArray' => $categoriesArray,
            'sizesArray' => $sizesArray,
            'labelsArray' => $labelsArray,
            'sku' => $sku
        ];
        
        return view('admin.products.edit')->withData($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Define validation rules.
        $validationRules = [
            'name' => 'required|max:255',
            'price' => 'required|integer',
            'quantity' => 'required|integer',
            'description' => 'required',
            'sku' => 'required|size:20',
            'sub_category_id' => 'required|integer',
            'sizes' => 'required'
        ];

        // Define custom validation messages.
        $validationCustomMessages = [
            'name.required' => 'Product name is required',
            'sub_category_id.required' => 'Choose a category',
            'sub_category_id.integer' => 'Oops. Something went wrong with the category',
            'sku.required' => 'Oops. Something went wrong with the SKU',
            'sku.size' => 'Oops. Something went wrong with the SKU',
            'sizes.required' => 'Select sizes for this product'
        ];

        $this->validate($request, $validationRules, $validationCustomMessages);

        // Create new product instance.
        $product = Product::find($id);

        // Assign form data to product properties.
        $product->name = $request->name;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $product->discount = $request->discount;
        $product->label = $request->label;
        $product->slug = $product->slug();
        $product->admin_id = Auth::guard('admin')->user()->id;


        // Get category ID
        $category_id = SubCategory::with('category')->find($request->sub_category_id)->category->id;

        $product->category_id = $category_id;
        $product->sub_category_id = $request->sub_category_id;

        $product->save();

        // Sync the products and the tags together
        // 'False' parameter lets the sync function not override
        // tag_id in the product_id table
        if (isset($request->sizes)) {
            $product->sizes()->sync($request->sizes, true);
        } else {
            $product->sizes()->sync([], true);
        }

         // Flash success message to session
        Session::flash('message.level', 'success');
        Session::flash('message.content', 'Saved Changes!. You can add or remove product images.');
        Session::flash('message.icon', 'check');

        return redirect()->route('images.show', $product->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get product to delete.
        $product = Product::find($id);

        // Detach related sizes and product.
        $product->sizes()->detach();

        // Detete Project.
        $product->delete();

        // Flash success message to session.
        Session::flash('message.delete', "Product deleted sucessfully!");
        
        return redirect()->route('products.index');
    }
}

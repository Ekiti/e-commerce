<?php

namespace App\Http\Controllers\Store;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\SubCategory;
use Cart;
use Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all caetgories and subcategories.
        $subcategories = SubCategory::with('category')->latest()->get();

        // Group them by category_id.
        $grouped = $subcategories->groupBy('category_id');

        // Get shopping cart content.
        $cartContent = Cart::getContent();

        // Get cart total with shipping fee.
        $shipping = 10;
        $cartTotal = Cart::getTotal() + $shipping;

        // Data to return to view.
        $data = [
            'grouped' => $grouped,
            'cartContent' => $cartContent,
            'cartTotal' => $cartTotal
        ];

        return view('user.cart')->withData($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        // Define properties to add to cart.
        $cart = [
            'id'               => $request->id,
            'name'             => $request->name,
            'price'            => $request->price,
            'quantity'         => $request->quantity,
            'attributes'       => [
                'size'              => $request->size,
                'sku'               => $request->sku,
                'slug'              => $request->slug,
                'discountedPrice'   => $request->discountedPrice,
                'image'             => $request->image,
                'discount'          => $request->discount,
                'seller'            => $request->seller
                                  ]
        ];
        // Add to cart.
        $addToCart = Cart::add($cart);

        if ($addToCart) {
            return response()->json(Cart::getTotalQuantity(), 200);
        } else {
            return response()->json('Error adding to cart', 400);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Clear shopping cart.
        $clearCart = Cart::clear();

        if ($clearCart) {
            return response()->json('Cart cleared', 200);
        } else {
            return response()->json('An error occurred while clearning all items from cart, please try again later.', 400);
        }
    }

    // Remove only one item from the cart.
    public function removeOne(Request $request) {
        // Delete Item.
        $removeItem = Cart::remove($request->itemId);

        if ($removeItem) {
            return response()->json('Item removed', 200);
        } else {
            return response()->json('An error occurred while removing item from cart, please try again later.', 400);
        }
    }
}

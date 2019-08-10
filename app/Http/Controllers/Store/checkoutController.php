<?php

namespace App\Http\Controllers\Store;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\SubCategory;
use App\Address;
use Session;
use Cart;
use Auth;

class checkoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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
        //Get delivery address of current user'
        $address = Address::where('user_id', Auth::user()->id)->get();

        // Get cart total with shipping fee.
        $shipping = 10;
        $cartTotal = Cart::getTotal() + $shipping;

        // Data to return to view.
        $data = [
            'grouped' => $grouped,
            'cartContent' => $cartContent,
            'cartTotal' => $cartTotal,
            'deliveryAddress'=>$address
        ];

        return view('user.checkout')->withData($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
    }
}

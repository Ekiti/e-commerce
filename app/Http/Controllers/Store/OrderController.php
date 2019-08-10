<?php

namespace App\Http\Controllers\Store;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Order;
use App\payment;
use Auth;
use Session;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function displayOrders()
    {
        $orders = Order::with('customer','product')->where('user_id', Auth::user()->id)->get();

        return view('user.myoders')->withOrders($orders);
    }
}

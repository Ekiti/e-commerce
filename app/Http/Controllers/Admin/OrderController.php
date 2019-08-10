<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    // Show all orders.
    public function index()
    {
        // Get orders.
        if(Auth::guard('admin')->user()->level === 100){
            $orders = Order::with('customer', 'address', 'vendoor','admin')->where('shop_id',Auth::guard('admin')->user()->id)->get();
        }else{
            $orders = Order::with('customer', 'address', 'vendoor','admin')->get(); 
        }
        // Data to pass to view.
        $data = [
            'orders' => $orders,
            'counter' => 1
        ];

        return view('admin.orders.index')->withData($data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function confirmOrder(Request $request){
        $order = Order::find($request->id);

        $order->status = "confirmed";

        if ($order->save()) {
            return response()->json(true, 200);
        } else {
            return response()->json('Error unable to confirm order', 400);
        }
    }
        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancelOrder(Request $request){
        $order = Order::find($request->id);

        $order->status = "canceled";

        if ($order->save()) {
            return response()->json(true, 200);
        } else {
            return response()->json('Error unable to cancel order', 400);
        }
    }
}

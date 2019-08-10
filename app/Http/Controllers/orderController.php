<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\payment;
use Auth;
use Session;
use Cart;
use Yabacon\Paystack;

class orderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paystack = new Paystack('sk_live_7d14b6fc0db3bcd363c9ecd0acd479e17823b61f');
       
        $trx = $paystack->transaction->verify(
            [
             'reference'=>$_GET['reference']
            ]
        );
        // status should be true if there was a successful call
        if(!$trx->status){
            exit($trx->message);
        }
        // full sample verify response is here: https://developers.paystack.co/docs/verifying-transactions
        if('success' == $trx->data->status){
            // use trx info including metadata and session info to confirm that cartid
          // matches the one for which we accepted payment
            give_value($reference, $trx);
        //   perform_success();
            return $trx->data;
        }
        
        // provide value to the customer
        function give_value($reference, $trx){
          // Be sure to log the reference as having gotten value
          // write code to give value
        }
        
        function perform_success(){
          // inline
          echo json_encode(['verified'=>true]);
          // standard
          header('Location: /success.php');
            exit();
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $payment = new Payment();

        $payment->payment_ref    = $request->reference;
        $payment->user_id        = Auth::user()->id;
        $payment->amount         = $request->amount;
        $payment->payment_status = $request->status;
        $payment->comment        = $request->comment;
        $payment->transaction_number = $request->transaction_number;

        $payment->save();

        $cartContent = Cart::getContent();
        foreach ($cartContent as $cart) {
            $order = new Order();
            $order->order_id      = $order->getOrderId();;
            $order->user_id       = Auth::user()->id;
            $order->product_id    = $cart->id;
            $order->product_price = $cart->price;
            $order->product_size  = $cart->attributes->size;;
            $order->product_qty   = $cart->quantity;
            $order->delivery_fee  = 500;
            $order->payment_status = $request->status;
            $order->payment_ref   = $request->reference;
            $order->status        = "pending";

            $order->save();
        }
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Order;
use App\payment;
use Auth;
use Session;
use Cart;
use Yabacon\Paystack;

class verifypaymentController extends Controller
{
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function vfy($ref)
    {
        $paystack = new Paystack('sk_live_xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx');
        
        $trx = $paystack->transaction->verify(['reference'=>$ref]);
     
        // status should be true if there was a successful call
        if(!$trx->status){
            exit($trx->message);
        }
        // full sample verify response is here: https://developers.paystack.co/docs/verifying-transactions
        if('success' == $trx->data->status){
          // use trx info including metadata and session info to confirm that cartid
          // matches the one for which we accepted payment

          //check if the amount payed is the actual amount to be paid
          // give_value($reference, $trx);
          if(count(payment::where('payment_ref', $ref)->get()) == 1){
              return "alradey verified";
          }else{
          $payment = new Payment();

            $payment->payment_ref    = $ref;
            $payment->user_id        = Auth::user()->id;
            $payment->amount         = $trx->data->amount;
            $payment->payment_status = $trx->data->status;
            $payment->comment        = "Aprroved";
            $payment->transaction_number = $trx->data->transaction_date;

            $payment->save();

            $cartContent = Cart::getContent();
            foreach ($cartContent as $cart) {
                $order = new Order();
                $order->order_id       = $order->getOrderId();;
                $order->user_id        = Auth::user()->id;
                $order->product_id     = $cart->id;
                $order->product_price  = $cart->price;
                $order->product_size   = $cart->attributes->size;
                $order->product_qty    = $cart->quantity;
                $order->product_image  = $cart->attributes->image;
                $order->delivery_fee   = 500;
                $order->payment_status = $trx->data->status;
                $order->payment_ref    = $ref;
                $order->status         = "pending";
                $order->shop_id        = $cart->attributes->seller;

                $order->save();
            }
            return redirect()->route('user.orders');
        }
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
    
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Product;
use App\Admin;
use App\Order;
use App\payment;
use App\Vendor;
use Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('admin.dashboard');
    }

    // / Admin Dashboard.
    public function dashboard()
    {
        $admin_level = Auth::guard('admin')->user()->level;
        if($admin_level === 100){
            $products = count(Product::where('admin_id', Auth::guard('admin')->user()->id)->get());
            $completed_orders = count(Order::where('status','confirmed')->where('shop_id', Auth::guard('admin')->user()->id)->get());
            $data = [
                'products' => $products,
                'completed_order' => $completed_orders
            ];

            return view('admin.dashboard')->withdata($data);
        }
        elseif ($admin_level  === 500) {
            $users = count(User::all());
            $products = count(Product::all());
            $money = Payment::all()->sum('amount')/100;
            $completed_orders = count(Order::where('status','confirmed')->get());
            $data = [
                'users' => $users,
                'products' => $products,
                'money' => $money,
                'completed_order' => $completed_orders
            ];
            return view('admin.Sdashboard')->withdata($data);
        }
    }
}

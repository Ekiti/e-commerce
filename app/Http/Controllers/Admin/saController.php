<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use App\Vendor;
use App\User;
use App\Admin;
use App\Product;
use App\Address;

class saController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function displayVendors(){
        //displays all vendors
       $vendors = Vendor::with('admin')->latest()->paginate(20);
       return view('admin.superAdmin.sellers')->withVendors($vendors);
    }
    /**
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function verifyVendor(Request $request){
        //get vendors id
        $id = $request->id;
        //find vendor from vendor table 
        $vendor = Vendor::find($id);
         // set verified column to be 1(true).
        $vendor->vendor_verified = 1;
        //check if it was able to save changes and return appropraite response.
        if ($vendor->save()) {
            return response()->json(true, 200);
        } else {
            return response()->json('Error adding to cart', 400);
        }
    }

        /**
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function blockVendor(Request $request){
        //get vendors id
        $id = $request->id;
        //find vendor from vendor table 
        $vendor = Vendor::find($id);
         // set verified column to be 1(true).
        if($vendor->vendor_status === 200){
            $vendor->vendor_status = 404;
        }else{
            $vendor->vendor_status = 200;
        }
        //check if it was able to save changes and return appropraite response.
        if ($vendor->save()) {
            return response()->json(true, 200);
        } else {
            return response()->json('Error adding to cart', 400);
        }
    }

    public function vendorProfile(){
        //show the profile of the vendor
    }

}

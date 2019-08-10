<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Session;
use App\Admin;
use App\Vendor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class VendorController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vendor = Vendor::where('vendor_owner', Auth::guard('admin')->user()->id)->get();
        if(count($vendor) >=1 ){
            return redirect(route('vendor.index'));
        }else{
            //show add address form
            return view('admin.vendor.addvendor');
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
        // Define validation rules.
        $validationRules = [
            'vendor_name'    => 'required|max:255',
            'vendor_country' => 'required',
            'vendor_state'   => 'required',
            'vendor_city'    => 'required',
            'vendor_address' => 'required',
            'vendor_phone'   => 'required',
            'vendor_description' => 'required'
        ];

        // Define custom validation messages.
        $validationCustomMessages = [
            'vendor_name.required'    => 'Your company/brand name is required',
            'vendor_country.required' => 'please choose a category',
            'vendor_phone.integer'    => 'please enter a valid phone number',
        ];

        $this->validate($request, $validationRules, $validationCustomMessages);

        // Create new product instance.
        $vendor = new Vendor();

        // Assign form data to product properties.
        $vendor->vendor_name    = $request->vendor_name;
        $vendor->vendor_country = $request->vendor_country;
        $vendor->vendor_state   = $request->vendor_state;
        $vendor->vendor_city    = $request->vendor_city;
        $vendor->vendor_address = $request->vendor_address;
        $vendor->vendor_phone   = $request->vendor_phone;
        $vendor->vendor_description = $request->vendor_description;
        $vendor->vendor_owner   = Auth::guard('admin')->user()->id;

        $vendor->save();

            // Flash success message to session
        Session::flash('message.level', 'success');
        Session::flash('message.content', 'Product created successfully! You can now add product images.');
        Session::flash('message.icon', 'check');

        return redirect()->route('admin.dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function show(Vendor $vendor)
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
        $vendor = Vendor::find($id);
        if($vendor->vendor_owner === Auth::guard('admin')->user()->id){
        return view('admin.vendor.editvendor')->withVendor($vendor);
        }else {
            return "access denied";
        }
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
            'vendor_name'    => 'required|max:255',
            'vendor_country' => 'required',
            'vendor_state'   => 'required',
            'vendor_city'    => 'required',
            'vendor_address' => 'required',
            'vendor_phone'   => 'required',
            'vendor_description' => 'required'
        ];

        // Define custom validation messages.
        $validationCustomMessages = [
            'vendor_name.required'    => 'Your company/brand name is required',
            'vendor_country.required' => 'please choose a category',
            'vendor_phone.integer'    => 'please enter a valid phone number',
        ];

        $this->validate($request, $validationRules, $validationCustomMessages);
        
        $vendor = Vendor::find($id);
         // Assign form data to product properties.
         $vendor->vendor_name    = $request->vendor_name;
         $vendor->vendor_country = $request->vendor_country;
         $vendor->vendor_state   = $request->vendor_state;
         $vendor->vendor_city    = $request->vendor_city;
         $vendor->vendor_address = $request->vendor_address;
         $vendor->vendor_phone   = $request->vendor_phone;
         $vendor->vendor_description = $request->vendor_description;
         $vendor->vendor_owner   = Auth::guard('admin')->user()->id;
 
         $vendor->save();
 
             // Flash success message to session
         Session::flash('message.level', 'success');
         Session::flash('message.content', 'changes saved.');
         Session::flash('message.icon', 'check');
 
         return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vendor $vendor)
    {
        //
    }
}

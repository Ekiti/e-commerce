<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Product;
use App\Admin;
use App\order;
use App\payment;
use App\Vendor;
use Auth;
use Session;

class profileController extends Controller
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
        $vendor = Vendor::where('vendor_owner', Auth::guard('admin')->user()->id)->get();
        return view('admin.profile.profile')->withvendor($vendor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('admin.profile.editprofile');
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
            'name' => 'required|min:1',
            'email' => 'required'
        ];

        // Define custom validation messages.
        $validationCustomMessages = [
            'name.required' => 'name is required',
            'email.required' => 'email is required',
        ];

        $this->validate($request, $validationRules, $validationCustomMessages);

        // Create new product instance.
        $user  = Auth::guard('admin')->user();
        // Assign form data to product properties.
        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

        Session::flash('message.level', 'success');
        Session::flash('message.content', 'changes saved.');
        Session::flash('message.icon', 'check');
        return redirect()->back();
    return redirect()->back();
    }
}

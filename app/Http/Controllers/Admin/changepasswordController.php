<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Auth;
use Session;


class changepasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function create() {
        return view('admin.profile.changepassword');
    }

    public function store(Request $request) {
        if(empty($request->get('currentpassword')) || empty($request->get('newpassword')) || empty($request->get('confirmpassword'))  ){
            Session::flash('message.level', 'danger');
            Session::flash('message.content', 'Please fill all fields.');
            Session::flash('message.icon', 'warning');
            return redirect()->back();
        }
        if (!(Hash::check($request->get('currentpassword'), Auth::guard('admin')->user()->password))) {
            // The passwords matches
            Session::flash('message.level', 'danger');
            Session::flash('message.content', 'Password do not match.');
            Session::flash('message.icon', 'warning');
            return redirect()->back();
        }

        if(strcmp($request->get('currentpassword'), $request->get('newpassword')) == 0){
            //Current password and new password are same
            Session::flash('message.level', 'danger');
            Session::flash('message.content', 'New Password cannot be same as your current password. Please choose a different password.');
            Session::flash('message.icon', 'warning');
            return redirect()->back();
        }


        if(!(strcmp($request->get('newpassword'), $request->get('confirmpassword'))) == 0){
            Session::flash('message.level', 'danger');
            Session::flash('message.content', 'Passwords do not match.');
            Session::flash('message.icon', 'warning');
            return redirect()->back();
        }         
           $objUser = Auth::guard('admin')->user();

        // Define validation rules.
        $validationRules = [
            'currentpassword' => 'required',
            'newpassword' => 'required|min:5'
        ];

        // Define custom validatoin messages.
         $validationCustomMessages = [
            'currentpassword.required' => 'password is required',
            'newpassword.required' => 'Please enter a new choose a category.'
        ];

        // Validate form data.
        $this->validate($request, $validationRules, $validationCustomMessages);


            //Change Password
            $request->user()->fill(['password'=>Hash::make($request->newpassword)])->save();
            Session::flash('message.level', 'success');
            Session::flash('message.content', 'Password changed.');
            Session::flash('message.icon', 'check');
            return redirect()->back();
    }
}

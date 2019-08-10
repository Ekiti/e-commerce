<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Auth;
use Session;

class changePasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getChangepassword() {
        return view('user.changepassword');
    }
    public function postChangepassword(Request $request) {
        if (!(Hash::check($request->get('currentpassword'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }

        if(strcmp($request->get('currentpassword'), $request->get('newpassword')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }


        if(!(strcmp($request->get('newpassword'), $request->get('confirmpassword'))) == 0){
            return redirect()->back()->with("error","paswords no not match.");     
        }         
           $objUser = Auth::user();

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

            return redirect()->back()->with("success","password changed");

    }
}

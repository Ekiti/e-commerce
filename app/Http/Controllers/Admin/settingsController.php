<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
use App\Settings;
use Auth;
use Session;

class settingsController extends Controller
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
        $settings = Settings::first();
        return view('admin.settings.settings')->withSettings($settings);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $settings = Settings::all();
        return view('admin.settings.edit')->withSettings($settings);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
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
        $settings  = Settings::find(1);
        // Assign form data to product properties.
        $settings->name = $request->name;
        $settings->email = $request->email;
        $settings->phone = $request->phone;
        $settings->address = $request->address;
        $settings->about = $request->about;
        $settings->facebook = $request->facebook;
        $settings->twitter = $request->twitter;
        $settings->googleplus = $request->googleplus;
        $settings->linkedin = $request->linkedin;
        $settings->instagram = $request->instagram;

        $settings->save();

        Session::flash('message.level', 'success');
        Session::flash('message.content', 'changes saved.');
        Session::flash('message.icon', 'check');
        return redirect()->back();
    }
}

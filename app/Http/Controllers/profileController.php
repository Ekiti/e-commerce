<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Address;

class profileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display the profile of users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $address = Address::where('user_id',Auth::user()->id)->get();
        return view('user.profile')->withAddress($address);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //No creating shit//
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //No storing shit//
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
        $id = Auth::user()->id;
        $user = Auth::user();
        return view('user.editProfile')->withUser($user);
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
        $user  = Auth::user();
        // Assign form data to product properties.
        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

        Session::flash('success', 'changes saved');

        return redirect()->route('profile.index', Auth::user()->id);
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

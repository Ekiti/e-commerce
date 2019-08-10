<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Address;
use Session;

class addressController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
        //check if user already has an address
        $address = Address::where('user_id', Auth::user()->id)->get();
        if(count($address) >=1 ){
            return redirect(route('profile.index'));
        }else{
            //show add address form
            return view('user.addaddress');
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
            'name' => 'required|max:255',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'address' => 'required',
            'phone' => 'required'
        ];

        // Define custom validation messages.
            $validationCustomMessages = [
            'name.max' => 'Sorry, the name you entered is too long',
        ];

        // Validate form data.
        $this->validate($request, $validationRules, $validationCustomMessages);

        // Instatiate new category instance.
        $address = new Address();

        // Assign form data to cateegory properties.
        $address->name = $request->name;
        $address->country = $request->country;
        $address->state = $request->state;
        $address->city = $request->city;
        $address->address = $request->address;
        $address->phone = $request->phone;
        $address->user_id = Auth::user()->id;
        

        // save to database.
        $address->save();

        // Flash success message to session.
        Session::flash('success', 'Delivery address saved');

        // Redirect to categories index.
        return redirect()->route('profile.index');
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
        $address = Address::find($id);
        if(empty($address)){
            return "invalid request";
        }
        if($address->user_id === Auth::user()->id){
            return view('user.editaddress')->withAddress($address);
        }else{
            return "acess denined";
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
            'name' => 'required|max:255',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'address' => 'required',
            'phone' => 'required'
        ];

        // Define custom validation messages.
            $validationCustomMessages = [
            'name.max' => 'Sorry, the name you entered is too long',
        ];

        // Validate form data.
        $this->validate($request, $validationRules, $validationCustomMessages);

        // Instatiate new category instance.
        $address = Address::find($id);

        // Assign form data to cateegory properties.
        $address->name = $request->name;
        $address->country = $request->country;
        $address->state = $request->state;
        $address->city = $request->city;
        $address->address = $request->address;
        $address->phone = $request->phone;
        $address->user_id = Auth::user()->id;
        

        // save to database.
        $address->save();

        // Flash success message to session.
        Session::flash('success', 'Delivery address updated');

        // Redirect to categories index.
        return redirect()->route('profile.index');    
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

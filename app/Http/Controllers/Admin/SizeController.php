<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Size;
use Session;

class SizeController extends Controller
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
        // Assign query string parameters to variable.
        $action = (isset($_GET['action'])) ? $_GET['action'] : ''; // Action
        $sid = (isset($_GET['SID'])) ? $_GET['SID'] : 0; // Size ID
        $isEdit = false;
        $editSize = '';

        if ($action == 'edit') {
            $isEdit = true;
            $editSize = Size::find($sid);
        }

        // Get all sizes
        $sizes= Size::latest()->get();
        $counter = 1;

        // Return data that will be passed to view
        $data = [
            'sizes' => $sizes,
            'counter' => $counter,
            'isEdit' => $isEdit,
            'editSize' => $editSize
        ];

        return view('admin.sizes.index')->withData($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => 'required|max:255|unique:sizes,name'
        ];

        // Define custom validation messages.
        $validationCustomMessages = [
            'name.required' => 'Size name is required.',
            'name.unique' => 'This size exist already'
        ];

        // Validate form data.
        $this->validate($request, $validationRules, $validationCustomMessages);

        // Instantiate new size instance.
        $size = new Size();

        // Assign form data to size properties.
        $size->name = strtoupper($request->name);

        // Save to database.
        $size->save();

        // Flash success message to session.
        Session::flash('message.level', 'success');
        Session::flash('message.content', 'Size Added Successfully.');
        Session::flash('message.icon', 'check');

        // Redirect to categories index.
        return redirect()->route('sizes.index');
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
        //
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
        // Get size to edit.
        $size = Size::find($id);

        // Define validation rules.
        $validationRules = [
            'name' => 'required|max:255'
        ];

        // Define custom validation messages.
        $validationCustomMessages = [
            'name.required' => 'Size name is required.'
        ];

        // Validate form data.
        $this->validate($request, $validationRules, $validationCustomMessages);

        // Assign form data to size properties.
        $size->name = strtoupper($request->name);

        // Save to database.
        $size->save();

        // Flash success message to session.
        Session::flash('message.level', 'success');
        Session::flash('message.content', 'Saved Changes.');
        Session::flash('message.icon', 'check');

        // Redirect to categories index.
        return redirect()->route('sizes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get size to delete.
        $size = Size::find($id);

        // Delete size.
        $size->delete();

        // flash delete success message to session.
        Session::flash('message.delete', 'Category deleted successfully.');

        // Redirect to sizes index
        return redirect()->route('sizes.index');
    }
}

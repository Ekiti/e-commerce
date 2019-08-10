<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Session;

class CategoryController extends Controller
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
        // Assign query string parameters to variable
        $action = (isset($_GET['action'])) ? $_GET['action'] : ''; // Action
        $cid = (isset($_GET['CID'])) ? $_GET['CID'] : 0; // Category ID
        $isEdit = false;
        $editCategory = '';

        if ($action == 'edit') {
            $isEdit = true;
            $editCategory = Category::find($cid);
        }

        // Get all categories
        $categories= Category::latest()->get();
        $counter = 1;

        // Return data that will be passed to view
        $data = [
            'categories' => $categories,
            'counter' => $counter,
            'isEdit' => $isEdit,
            'editCategory' => $editCategory
        ];

        return view('admin.categories.index')->withData($data);
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
            'name' => 'required|max:255|unique:categories,name'
        ];

        // Define custom validation messages.
         $validationCustomMessages = [
            'name.required' => 'Category name is required',
            'name.unique' => 'This category exist already'
        ];

        // Validate form data.
        $this->validate($request, $validationRules, $validationCustomMessages);

        // Instatiate new category instance.
        $category = new Category();

        // Assign form data to cateegory properties.
        $category->name = ucwords(strtolower($request->name));
        $category->slug = $category->slug();

        // save to database.
        $category->save();

        // Flash success message to session.
        Session::flash('message.level', 'success');
        Session::flash('message.content', 'Category Added Successfully.');
        Session::flash('message.icon', 'check');

        // Redirect to categories index.
        return redirect()->route('categories.index');
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
        // Get category to update
        $category = Category::find($id);

        // Define validation rules
        $validationRules = [
            'name' => 'required|max:255'
        ];

        // Define custom validation messages.
         $validationCustomMessages = [
            'name.required' => 'Category name is required'
        ];

        // Validate post data
        $this->validate($request, $validationRules, $validationCustomMessages);

        // Assign post data to category properties
        $category->name = ucwords(strtolower($request->name));
        $category->slug = $category->slug();

        // Save changes
        $category->save();

         // Flash success message to session.
        Session::flash('message.level', 'success');
        Session::flash('message.icon', 'check');
        Session::flash('message.content', 'Saved Changes');

        // Redirect to tag index.
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get category to delete.
        $category = Category::find($id);

        // Delete associated sub-categories.
        $category->subcategories()->delete();

        // Delete category.
        $category->delete();

        // Flash delete success message to session
        Session::flash('message.delete', 'Category deleted successfully.');

        // Redirect to categories index
        return redirect()->route('categories.index');
    }
}

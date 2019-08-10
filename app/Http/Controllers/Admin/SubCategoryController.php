<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SubCategory;
use App\Category;
use Session;

class SubCategoryController extends Controller
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
        $cid = (isset($_GET['SID'])) ? $_GET['SID'] : 0; // Sub Category ID
        $isEdit = false;
        $editSubCategory = '';

        // Get all categories.
        $categories = Category::all();
        $categoriesArray =[
            '' => 'Select a category'
        ];

        foreach ($categories as $category) {
            $categoriesArray[$category->id] = $category->name;
        }

        if ($action == 'edit') {
            $isEdit = true;
            $editSubCategory = SubCategory::find($cid);
        }

        // Get all subcategories
        $subcategories= SubCategory::with('category')->latest()->get();
        $counter = 1;
        
        $grouped = $subcategories->groupBy('category_id');
        // Return data that will be passed to view
        $data = [
            'categoriesArray' => $categoriesArray,
            'subcategories' => $subcategories,
            'counter' => $counter,
            'isEdit' => $isEdit,
            'editSubCategory' => $editSubCategory,
            'grouped' => $grouped
        ];

        return view('admin.subcategories.index')->withData($data);
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
            'name' => 'required|max:255',
            'category_id' => 'required|integer|max:255'
        ];

        // Define custom validation messages.
        $validationCustomMessages = [
            'name.required' => 'Sub-category name is required',
            'category_id.required' => 'Please choose a category.'
        ];

        // Validate form data.
        $this->validate($request, $validationRules, $validationCustomMessages);

        // Instantiate new subcategory instance.
        $subcategory = new SubCategory();

        // Assign form data to subcategory properties
        $subcategory->name = ucwords(strtolower($request->name));
        $subcategory->slug = $subcategory->slug();
        $subcategory->category_id = $request->category_id;

        // Save to database
        $subcategory->save();
        
        // Flash success message to session
        Session::flash('message.level', 'success');
        Session::flash('message.content', 'Sub-Category Added Successfully.');
        Session::flash('message.icon', 'check');

        // Redirect to categories index.
        return redirect()->route('subcategories.index');
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
        // get subcaegory to update.
        $subcategory = SubCategory::find($id);

        // Define validation rules.
        $validationRules = [
            'name' => 'required|max:255',
            'category_id' => 'required|integer|max:255'
        ];

        // Define custom validatoin messages.
         $validationCustomMessages = [
            'name.required' => 'Sub-category name is required',
            'category_id.required' => 'Please choose a category.'
        ];

        // Validate form data.
        $this->validate($request, $validationRules, $validationCustomMessages);

        // Assign form data to subcategory properties
        $subcategory->name = ucwords(strtolower($request->name));
        $subcategory->slug = $subcategory->slug();
        $subcategory->category_id = $request->category_id;

        // Save to database
        $subcategory->save();
        
        // Flash success message to session
        Session::flash('message.level', 'success');
        Session::flash('message.content', 'Saved Changes.');
        Session::flash('message.icon', 'check');

        // Redirect to categories index.
        return redirect()->route('subcategories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get subcategory to delete.
        $subcategory = SubCategory::find($id);

        // Delete subcategory.
        $subcategory->delete();

        // Flash delete success message to session
        Session::flash('message.delete', 'Sub-Category deleted successfully.');

        // Redirect to subcategories index
        return redirect()->route('subcategories.index');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use Image;
use Session;
use Storage;

class ImageController extends Controller
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
    public function create($product_id)
    {
        // Get current product details.
        $product = Product::find($product_id);

        // Data to return to view.
        $data = [
            'product' => $product
        ];

        return view('admin.images.create')->withData($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $product_id)
    {
         // Defin validation rule array.
        $validationRules = [
            'file' => 'required|image|max:5000'
        ];

        // Validate form data
        $this->validate($request, $validationRules);

        // Instantiante new Image object.
        $imageObj = new \App\Image();

        // Assign post data to image properties.
        $imageObj->product_id = $product_id;

        // If request has file, upload image to appropiate folder
        if ($request->hasFile('file')) {
            $image = $request->file;
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = $imageObj->storageLocation($filename);
            Image::make($image)->save($location);

            // Save filename.
            $imageObj->src = $filename;

            $imageObj->save();

            return response()->json('Image Uploaded', 200);
        }

        return response()->json('Upload error', 400);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($product_id)
    {
         // Get current product details.
        $product = Product::find($product_id);

        $half = ceil($product->images->count() / 2);
        $chunks = $product->images->chunk($half);

        // Data to return to view.
        $data = [
            'product' => $product,
            'chunks' => $chunks
        ];

        return view('admin.images.show')->withData($data);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_id, $image_id)
    {
        // Get image to delete.
        $image = \App\Image::where('product_id', '=', $product_id)
                            ->where('id', '=', $image_id);

        // Delete Image from database.
        $image->delete();

        // Flash success msessage to session.
        Session::flash('message.level', 'success');
        Session::flash('message.content', 'Image deleted successfully.');
        Session::flash('message.icon', 'check');

        return redirect()->route('images.show', $product_id);
    }
}

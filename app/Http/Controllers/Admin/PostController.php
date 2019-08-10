<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Session;

class PostController extends Controller
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
        // Get all posts
        $posts = Post::with(['images'])->latest()->where('admin_id', '=', Auth::guard('admin')->user()->id)->paginate(20);

        // Counter for serial number.
        $counter = 1;

        // Data to return to view
        $data = [
            'counter' => $counter,
            'posts' => $posts
        ];

        return view('admin.post.index')->withData($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Create new product instance.
        $post = new Post();

        // Get product sku
        $sku = $post->sku();

        $data = [
            'sku' => $sku
        ];
        
        return view('admin.post.create')->withData($data);
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
            'sku' => 'required|size:20',
        ];

        // Define custom validation messages.
        $validationCustomMessages = [
            'sku.required' => 'Oops. Something went wrong with the SKU',
            'sku.size' => 'Oops. Something went wrong with the SKU',
        ];

        $this->validate($request, $validationRules, $validationCustomMessages);

        // Create new product instance.
        $post = new Post();

        // Assign form data to product properties.
        $post->title = ucwords(strtolower($request->title));
        $post->category = $request->category;
        $post->details = $request->details;
        $post->sku = $request->sku;
        $post->slug = $post->slug();
        $post->admin_id = Auth::guard('admin')->user()->id;

        $post->save();

         // Flash success message to session
        Session::flash('message.level', 'success');
        Session::flash('message.content', 'Post created successfully! You can now add images to this post.');
        Session::flash('message.icon', 'check');

        return redirect()->route('images.create',["posts", $post->id]);
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
        // Create new product instance.
        $post = Post::find($id);

        // Get product sku
        $sku = $post->sku;

        $data = [
            'post' => $post,
            'sku' => $sku
        ];
        
        return view('admin.post.edit')->withData($data);
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
            'sku' => 'required|size:20',
        ];

        // Define custom validation messages.
        $validationCustomMessages = [
            'sku.required' => 'Oops. Something went wrong with the SKU',
            'sku.size' => 'Oops. Something went wrong with the SKU',
        ];

        $this->validate($request, $validationRules, $validationCustomMessages);


        // Create new product instance.
        $post = Post::find($id);

        // Assign form data to product properties.
        // Assign form data to product properties.
        $post->title = ucwords(strtolower($request->title));
        $post->category = $request->category;
        $post->details = $request->details;
        $post->slug = $post->slug();
        $post->admin_id = Auth::guard('admin')->user()->id;

        $post->save();
         // Flash success message to session
        Session::flash('message.level', 'success');
        Session::flash('message.content', 'Saved Changes!. You can add or remove post\'s images.');
        Session::flash('message.icon', 'check');

        return redirect()->route('images.show',['posts', $post->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get product to delete.
        $post = Post::find($id);

        // Detete Project.
        $post->delete();

        // Flash success message to session.
        Session::flash('message.delete', "Post deleted sucessfully!");
        
        return redirect()->route('posts.index');
    }
}

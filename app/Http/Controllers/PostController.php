<?php

namespace App\Http\Controllers;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\post;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class PostController extends Controller
{
      /**
     * Display a listing of the resource.
     */

    // public function index()
    // {
    //     // Carbon::now();
    //     $posts = Post::all();
    //     return view('readblog', compact('posts'));
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        //dd();
        return view('blog.createblog');
    }

    public function ccreate()
    {
        //
        //dd();
        return view('user.createblog');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
// $hi=$request->all();
// dd($hi);
        $post = new Post();


        if($request->hasFile('image')){
            $request->validate([
                'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:5048',
            ]);
            $imageName = time().'.'.$request->image->extension();
            //$request->image->move(public_path('images'), $imageName);
            $post->image = $imageName;
        }

            $post->title = $request->title;
            $post->body = $request->body;
            $post->user = Auth::user()->id;
            $post->save();
    // Post::create($this->validateRequest());
   // Alert::toast('Successfully added a post ', 'success');
            if (Auth::user()->hasRole(['admin', 'superadmin'])) {
                return redirect()->route('readblog');
            }

            return redirect()->route('user.readblog');

            //return view('blog.readblog', compact('post'));

    }


    public function logout(Request $request)
    {
        Auth::logout();

        // Invalidate the session to prevent reuse
        $request->session()->invalidate();

        // Regenerate the CSRF token to prevent any issues with token mismatch
        $request->session()->regenerateToken();

        return redirect('/login'); // Redirect to login or another route
    }

    /**
     * Display the specified resource.
     */
    public function welcome(){
        $post = Post::all();
        return view('welcome', compact('post'));
    }

    public function show(post $post)
    {
        //
        $post = Post::all();
        return view('blog.readblog', compact('post'));

    }

    public function View(Post $post)
    {
        // dd($post->id);
        $posts = Post::where('id', '<>', $post->id)->take(10)->get();
        return view('view', compact('post','posts'));
    }

    public function contact()
    {
        //

        return view('blog.contact', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}

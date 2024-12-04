<?php

namespace App\Http\Controllers;
use App\Models\post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function welcome()
    {
        //
        return view('register');
    }

  public function  userreadblog (post $post){
    $post = Post::all();
    return view('user.readblog', compact('post'));

  }

    public function userread(Post $post){

        $post =  post::where('id', '<>', $post->id)->take(10)->first();
//dd($post);
        //return view('user.userview', compact('post'));

    }

    public function addUser(Request $request)
    {
//    dd($request->all());
//    dd($request->all());

     $validated = $request->validate([
       'name' => ['required', 'string', 'max:255'],
       'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
       'password' => ['required', 'string', 'min:8', 'confirmed'],
     ]);

       $user = User::create([
           'name' => $request->name,
           'email' => $request->email,
           'password' => bcrypt($request->password)    ]);

        $user->assignRole('user');
           //Alert::toast('Successfully added an account ', 'success');

           //return redirect()->back();
           return view('user.createblog');


    }
    /**
     * Show the form for creating a new resource.
     *
     */
    public function createAccount(){

return view('user.createAccount');

    }

    public function createblog()
    {
        //
        return view('user.createblog');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
     Post::create($this->validateRequest());
    //Alert::toast('Successfully added a post ', 'success');
            if (Auth::user()->hasRole(['admin', 'superadmin'])) {
                return redirect()->route('rreadblog');
            }

            return redirect()->route('ccreateblog');

    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
        $post = Post::all();
        return view('user.readblog', compact('post'));

    }
    public function contact()
    {
        //

        return view('user.contact', compact('post'));
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

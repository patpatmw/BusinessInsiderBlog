<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PrivateController extends Controller
{


    public function index(){

        if (Auth::user()->hasRole(['admin', 'superadmin'])) {
            return to_route('dashboard');
        }

        return redirect()->route('welcome');
    }

    public function addUser(Request $request)
{
    // Validate the incoming request data
    // $validated = $request->validate([
    //     'name' => ['required', 'string', 'max:255'],
    //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //     'password' => ['required', 'string', 'min:8', 'confirmed'],
    // ]);

    // Create the user
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
    ]);

    // Assign a default role to the user
    $user->assignRole('user');

    // Automatically log in the user
    Auth::login($user);

    // Show a success message
    Alert::toast('Account created successfully and you are now logged in!', 'success');

    // Redirect to a specific route (e.g., dashboard or homepage)
    return redirect()->route('showAllStories'); // Replace 'dashboard' with your desired route name
}

     public function createUserAccount(){
        return view('user.createAccount');
     }

     public function createStory(){
        return view('user.createblog');
     }

     public function showStories( post $post){
       $posts = post::where('id', '<>', $post->id)->take(10)->get();
       // return view('user.readblog', compact('posts'));
       return view('user.readblog', compact('post','posts'));
     }

     public function showAllStories(){
        $posts = post::orderBy('id','desc')->get();
        return view('user.readAllBlogs', compact('posts','posts'));
     }

}

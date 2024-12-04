<?php
namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postController;
use App\Models\Post;
//use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrivateController;

use Closure;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('viewuser',[PrivateController::class, 'view'])->name('view');
Route::post('createUserAccount',[PrivateController::class, 'createUserAccount'])->name('createUserAccount');
Route::get('createUserAccount',[PrivateController::class, 'createUserAccount'])->name('createUserAccount');
//Route::get('addUser',[PrivateController::class, 'addUser'])->name('addUser');
Route::post('addUser',[PrivateController::class, 'addUser'])->name('addUser');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //Route::post('/createblog', [postController::class, 'store'])->name('createblog');
    //Route::get('/createblog', [postController::class, 'create'])->name('createblog');
    Route::post('/readblog', [postController::class, 'show'])->name('readblog');
    Route::get('/readblog', [postController::class, 'show'])->name('readblog');
    Route::get('/contact', [postController::class,'contact'])->name('contact');
    Route::post('/ccreateblog', [postController::class, 'store'])->name('ccreateblog');
    Route::get('/ccreateblog', [postController::class, 'create'])->name('ccreateblog');
    Route::get('logout',[PostController::class, 'logout'])->name('logout');
    Route::get('singlepost/{post}',[PostController::class, 'singlepost'])->name('singlepost');
    Route::delete('deletepost{post}',[PostController::class, 'destroy'])->name('deletepost');
    //Route::get('deletepost{post}',[PostController::class, 'destroy'])->name('deletepost');

    Route::get('/createblog', [postController::class, 'create'])->name('createblog');
    Route::post('/createblog', [postController::class, 'create'])->name('createblog');


    Route::get('showAllStories',[PrivateController::class, 'showAllStories'])->name('showAllStories');

    Route::get('createStory',[PrivateController::class, 'createStory'])->name('createStory');
    Route::get('showStories/{post}',[PrivateController::class, 'showStories'])->name('showStories');



//saveuser



});
Route::middleware('auth')->group(function () {

    Route::get('/createAccount', [UserController::class, 'createAccount'])->name('createAccount');
    Route::post('/createAccount', [UserController::class, 'createAccount'])->name('createAccount');

    Route::get('/Userreadblog', [UserController::class, 'userreadblog'])->name('userreadblog');
    Route::get('/userread/{post}', [UserController::class, 'userread'])->name('userread');
    Route::post('/makeBlog', [postController::class, 'store'])->name('makeBlog');


   // Route::get('/welcome', [UserController::class, 'welcome'])->name('welcome');

});



Route::prefix('admin')->middleware('auth', 'isAdmin')->group(function () {
    Route::get('blogs/pending', [PostController::class, 'pendingBlogs'])->name('admin.blogs.pending');
    Route::post('blogs/{id}/approve', [PostController::class, 'approveBlog'])->name('admin.blogs.approve');
});



require __DIR__.'/auth.php';

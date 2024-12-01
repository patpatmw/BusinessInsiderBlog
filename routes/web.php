<?php
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/createblog', [postController::class, 'store'])->name('createblog');
    Route::get('/createblog', [postController::class, 'create'])->name('createblog');
    Route::post('/readblog', [postController::class, 'show'])->name('readblog');
    Route::get('/readblog', [postController::class, 'show'])->name('readblog');
    Route::get('/contact', [postController::class,'contact'])->name('contact');
    Route::post('/ccreateblog', [postController::class, 'store'])->name('ccreateblog');
    Route::get('/ccreateblog', [postController::class, 'create'])->name('ccreateblog');
    Route::get('logout',[PostController::class, 'logout'])->name('logout');
    Route::get('view-story/{post}',[PostController::class, 'View'])->name('viewpost');

});
Route::middleware('auth')->group(function () {

    Route::get('/createAccount', [UserController::class, 'createAccount'])->name('createAccount');
    Route::post('/createAccount', [UserController::class, 'createAccount'])->name('createAccount');
    Route::get('/addUser', [UserController::class, 'addUser'])->name('addUser');
    Route::post('/addUser', [UserController::class, 'addUser'])->name('addUser');

   // Route::get('/welcome', [UserController::class, 'welcome'])->name('welcome');

});


require __DIR__.'/auth.php';
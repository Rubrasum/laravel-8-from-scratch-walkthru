<?php
// author Joe Betbeze
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;


Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::post('posts/{post:slug}/comments', [CommentController::class, 'store'])->middleware('auth');

Route::post('newsletter', NewsletterController::class);

// middleware runs on every request, guest says only non-user can sign in
Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');
// opposite of guest is auth, you can check it out at app/Http/Kernel.php
Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('sessions', [SessionsController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

Route::get('admin/posts/create', [PostController::class,'create'])->middleware('admin');
Route::post('admin/posts', [PostController::class, 'store'])->middleware('admin');


// #66
//  dropdown for menu for adding post and going to dashboard
//  turn create post page into a component for admin page
//  adding a dashboard sidebar
//  Adding login button to the same component form
//  Also offscreened the register page

// #67
// Creating a form for editing and deleting posts
// using old() with a default to make the edit page no different than the create
// thumbnail field display
// dont forget csrf
// add hiddne PATCH input
// also add post id for edit.

// #68
//  Creating a validation method for a model that works for Restful stuff.

// #69
// Authorization - use a Gate facade class in AppServiceProider to setup user()->can() and user()->cannot()
// also @can directive
// passing can through middleware
// all AdminPostcontroller actions simplified route with except()

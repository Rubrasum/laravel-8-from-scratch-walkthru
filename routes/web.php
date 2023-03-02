<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('posts');
});

Route::get('posts/{post}', function ($slug) {
    // get post path


    // if file doesn't exist, debug
    if (! file_exists($post_path = __DIR__ . "/../resources/posts/{$slug}.html")) {
        return redirect("/");
    }

    $post = cache()->remember("posts.{$slug}", 1200, fn() => file_get_contents($post_path));

    return view('post', ['post' => $post]);
})->where('post', '[A-z_\-]+');

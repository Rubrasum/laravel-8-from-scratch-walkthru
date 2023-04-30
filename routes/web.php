<?php
// author Joe Betbeze
use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Models\Post;

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

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [PostController::class, 'show']);


Route::get('authors/{author:username}', function (User $author) { // Post::where('slug', $post)->firstOrFail();

    return view('posts', [
        'posts' => $author->posts,
        'categories' => Category::all()
    ]);
});

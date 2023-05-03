<?php
// author Joe Betbeze
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Services\Newsletter;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

Route::post('newsletter', function() {

    try {
        (new Newsletter())->subscribe(request('email'));
    } catch (\Exception $e) {
        throw ValidationException::withMessages([
            'email' => 'This email could not be added to our newsletter list.'
        ]);
    }

    return redirect('/')
        ->with('success', 'You are now signed up for our newsletter!');
});

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::post('posts/{post:slug}/comments', [CommentController::class, 'store'])->middleware('auth');

// middleware runs on every request, guest says only non-user can sign in
Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');
// opposite of guest is auth, you can check it out at app/Http/Kernel.php
Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('sessions', [SessionsController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');




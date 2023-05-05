<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CommentController extends Controller
{
    // 7 Restful actions: index, show, create, store, edit, update, destroy
    public function store(Post $post) {

        $attributes = request()->validate([
            'body' => 'required'
        ]);

        $post->comments()->create([
            'user_id' => request()->user()->id,
            'body' => request('body')
        ]);

//         Check validation
        if (! auth()->attempt($attributes)) {
            // auth failed.
            throw ValidationException::withMessages([
                'body' => 'You must enter text for your comment'
            ]);
        }

        return back()->with('success', 'Comment Posted!'); // redirect, success flash
    }
}

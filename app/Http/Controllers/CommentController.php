<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    // 7 Restful actions: index, show, create, store, edit, update, destroy
    public function store() {

        $attributes = request()->validate([
            'user_id' => ['required'],
            'post_id' => ['required'],
            'body' => 'required'
        ]);
        // Check validation
        if (! auth()->attempt($attributes)) {
            // auth failed.
            throw ValidationException::withMessages([
                'user_id' => 'Date error, contact site admin',
                'post_id' => 'Date error, contact site admin',
                'body' => 'You must enter text for your comment'

            ]);
        }

        return redirect('/')->with('success', 'Welcome Back!'); // redirect, success flash
    }
}

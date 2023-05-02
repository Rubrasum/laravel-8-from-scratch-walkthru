<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function destroy() {
        auth()->logout();

        return redirect('/')->with('success', "Goodbye!");
    }

    public function create() {
        return view('sessions.create');
    }

    // Attempt to authenticate and log in the user
    // based on the provided credentials
    public function store() {

        $attributes = request()->validate([
            'username' => ['required'],
            'password' => 'required'
        ]);
        // Check validation
        if (! auth()->attempt($attributes)) {
            // auth failed.
            throw ValidationException::withMessages([
                'username' => 'Your provided credentials could not be verified'
            ]);
        } else {
            session()->regenerate();

            return redirect('/')->with('success', 'Welcome Back!'); // redirect, success flash
        }
    }
}

/**
 * Laravel Breeze vs Laravel Jetstream
 *
 * Breeze: If you're doing breeze you wanna do it right away at the start of the project, refer to #51.
 *
 */

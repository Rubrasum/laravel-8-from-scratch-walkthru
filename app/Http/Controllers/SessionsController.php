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
            'email' => ['required','email'],
            'password' => 'required'
        ]);

        // signs you in and checks
        if (auth()->attempt($attributes)) {
            return redirect('/')->with('success', 'Welcome Back!'); // redirect, success flash
        }

        // auth failed.
        throw ValidationException::withMessages([
            'email' => 'Your provided credentials could not be verified'
        ]);
    }
}

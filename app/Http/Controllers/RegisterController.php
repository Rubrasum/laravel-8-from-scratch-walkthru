<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create() {
        return view('register.create');
    }

    public function store() {
        // This automatically sends you back to the register page if you fail validation.
        $attributes = request()->validate([
            'name' => ['required', 'max:255'],
            'username' => ['required', 'max:255', 'min:3'],
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'min:7', 'max:255'],
        ]);

        // Use eloquent mutator in User Model

        User::create($attributes);


    }
}

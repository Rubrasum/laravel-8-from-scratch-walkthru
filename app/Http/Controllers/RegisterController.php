<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function create() {
        return view('register.create');
    }

    public function store() {
        // This automatically sends you back to the register page if you fail validation.
        $attributes = request()->validate([
            'name' => ['required', 'max:255'],
            'username' => ['required', 'max:255', 'min:3', Rule::unique('users','username')],
            'email' => ['required', 'email', 'max:255', Rule::unique('users','email')],
            'password' => ['required', 'min:7', 'max:255'],
        ]);

        // Use eloquent mutator in User Model
        $user = User::create($attributes);

        //log in the user
        auth()->login($user);

        return redirect('/')->with('success', 'Your account has been created.');
    }
}

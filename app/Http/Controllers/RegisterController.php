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
        // return request()->all();

        // create attributes
        $attributes = request()->validate([
            'name' => ['required', 'max:255'],
            'username' => ['required', 'max:255', 'min:3', Rule::unique('users', 'username')],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
            'password' => ['required', 'max:255', 'min:7']
        ]);

        // $attributes['password'] = bcrypt($attributes['password']); // this is one way to hash the password
        // another way of hashing is by using a mutator in the model

        // dd('success!');
        //create user
        $user = User::create($attributes);

        //login user
        auth()->login($user);

        // redirect with flash message
        // session()->flash('success', 'Your account has been created.'); // below is shorthand
        return redirect('/')->with('success', 'Your account has been created.');
    }
}

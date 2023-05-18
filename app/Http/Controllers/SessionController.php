<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{

    public function create() {
        return view('sessions.create');
    }

    public function store() {
        // validate request
        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        // attempt to authenticate provided credentials and if it fails return error
        if (! auth()->attempt($attributes)) { // attempt both authenticates and logs in the user if auth is successful

            return back()
            ->withInput()
            ->withErrors(['email' => 'Could not verify provided credentials.']);
        }

        // session fixation handling
        session()->regenerate();

        // redirect with success flash message if nothing goes wrong
        return redirect('/')->with('success', 'Successfuly logged in.');

        // another way to handle failed auth:
        // throw ValidationException::withMessages([
        //     'email' => 'Could not verify provided credentials'
        // ]);


    }

    public function destroy() {
        auth()->logout();

        return redirect('/')->with('success', 'You have been logged out.');
    }
}

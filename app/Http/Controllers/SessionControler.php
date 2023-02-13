<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionControler extends Controller
{
    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye come soon!');
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        $attrs = request()->validate(
            [
                'email' => 'required|email',
                'password' => 'required'
            ]
        );


        if (auth()->attempt($attrs)) {
            session()->regenerate();
            return redirect('/')->with('success', 'Welcome Back');
        }
        throw ValidationException::withMessages(
            ['email' => 'Provided credentials could not be verified']
        );
    }
}

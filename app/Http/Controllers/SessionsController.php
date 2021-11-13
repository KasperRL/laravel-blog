<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        if (!Auth::attempt($attributes)) {
            throw ValidationException::withMessages(
                ['password' => 'Your provided credentials could not be verified.']
            );
        }

        session()->regenerate();
        return redirect('/')->with('success', 'Welcome back!');
    }

    public function destroy()
    {
        Auth::logout();

        return redirect('/')->with('success', 'Goodbye!');
    }
}

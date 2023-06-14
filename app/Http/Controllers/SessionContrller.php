<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionContrller extends Controller
{
    public function destroy(){
        auth()->logout();
        return redirect('/')->with('success', 'Goodbye..');
    }

    public function crate(){
        return view('sessions.create');
    }


    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt($attributes)){
            session()->regenerate();
            return redirect('/')->with('success', 'Welcome Back...!');
        }
//        return back()->withErrors([
//            'email' => 'Credential does not match',
//        ]);
        throw ValidationException::withMessages([
            'email' => 'Credential does not match',
        ]);
    }









}

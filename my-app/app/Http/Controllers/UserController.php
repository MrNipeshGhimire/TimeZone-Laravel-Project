<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{

     //login
     public function loginPage(){
        return view('frontend.pages.login');
    }

    public function registerForm(){
        return view('frontend.pages.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
 
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
 
        return redirect('/')->with('message', 'Registration successful! Please log in.');

        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required',
        //     'password' => 'required',
        //     'password_confirmation' => 'required_with:password|same:password',
        // ]);
        // // dd($request->all());
        // // die;
        // User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => $request->password,
        // ]);
  
        // if (\Auth::attempt($request->only('email', 'password'))) {
        //     return redirect()->route('frontend.index');
        // }
        // return redirect()->route('frontend.register')->with('error', 'error while registering');
    }

    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        return redirect()->intended('/');
    }

    return redirect('/login')->with('error', 'Invalid credentials. Please try again.');
}
}

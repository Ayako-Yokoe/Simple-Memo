<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Show Register Form
    public function create(){
        return view('users.register');
    }

    // Create New User
    public function store(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);

        // Hash Password
        $credentials['password'] = bcrypt($credentials['password']);

        // Create User
        $user = User::create($credentials);

        // Log In
        auth()->login($user);

        return redirect()->route('memos.index');
    }

    // Log User Out
    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('users.login');
    }

    // Show Login Form
    public function login(){
        return view('users.login');
    }

    // Log In User
    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);

        // Remember Me
        $remember = $request->has('remember');

        if(auth()->attempt($credentials, $remember)){
            $request->session()->regenerate();
            return redirect()->route('memos.index');
        }

        return back()->withErrors(['email' => '入力情報に誤りがあります'])->onlyInput('email');
    }
}
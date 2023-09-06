<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function create()
    {
        return view('users.register');
    }
    public function login()
    {
        return view('users.login');
    }
    public function auth(Request $request)
    {
       $formFields = $request->validate([
        'email'=>['required', 'email', ],
        'password' => 'required'
       ]);

       if(auth()->attempt($formFields)) {
        $request->session()->regenerate();
        return redirect("/")->with(['message' => 'Logged in']);
       }

       return back()->withErrors(['email' => 'Invalid'])->onlyInput("email");

    }
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect("/")->with(['message'=> 'Logout']);
    }

    
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:3',
        ]);
        
        
        $formFields['password'] = bcrypt($formFields['password']);
        $user = User::create($formFields);


        auth()->login($user);


        return redirect("/");
    }
}
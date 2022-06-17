<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //show register form

    public function create(){
        return view('register');
    }

    public function store(Request $request){
        $formFields = $request->validate([
            'username' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6',
        ]);

        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');     
        };
        $formFields['password'] = Hash::make($formFields['password']);
        
        //create user && login
        $user = User::create($formFields);
        //login
        auth()->login($user);
        return redirect('/pass')->with('message', 'User logged in');
    }

    //logout
    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/pass')->with('message', 'You have been logged Out!');
    }

    public function login(Request $request){
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        
        if(auth()->attempt($formFields)){
            $request->session()->regenerate();

            return redirect('/pass')->with('message', 'You are now logged in!🙂');
        }

        return redirect()->back()->with('message', 'Invalid Credentials');
    }    
}

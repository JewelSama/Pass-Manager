<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create(){
            return view('pass.profile');
        }
    
    //store posts data

    public function store(Request $request){
        $formFields = $request->validate([
            'app' => 'required',
            'username' => 'required',
            'password' => 'required',
            'alternate_login' => 'required'
        ]);
        return redirect('/pass');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create(){
        $posts = Posts::get();

            return view('pass.profile', [
                'posts' => $posts
            ]);
        }
    
    //store posts data
    public function index(){
        return view('pass.profile');
    }

    public function store(Request $request){
        $formFields = $request->validate([
            'app' => 'required',
            'username' => 'required',
            'password' => 'required',
            'alternate_login' => 'required'
        ]);

        Posts::create([
        'app' => $request-> app,
        'username' => $request-> username,
        'password' => $request-> password,
        'alternate_login' => $request-> alternate_login,
        'user_id' => auth()->id()
    
    ]);

        return redirect('/profile')->with('message', 'Password added successfully');
    }

    public function profile(){
        return view('/profile', ['posts' => auth()->user()->posts()->get()]);
    }

    //show Edit form

    public function edit($id){

        // $p = Posts::where('id', $posts)->first();
        // dd($posts->app);
        $post = Posts::find($id);
        return view('edit', compact('post'));
    }



        public function update(Request $request, $id){
            $posts = Posts::find($id);
            $posts->app = $request->app;
            $posts->username = $request->username;
            $posts->password = $request->password;
            $posts->alternate_login = $request->alternate_login;
            $posts->update();
            return redirect('/profile')->with('message', 'Password updated successfully!');
        }

        public function destroy($id){
            $posts = Posts::find($id);
            $posts->delete();
            return redirect('/profile')->with('message', 'Password deleted successfully!🚮');
        }
}

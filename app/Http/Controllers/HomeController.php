<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()){
            $id = auth()->user()->id;
            $posts = Post::where('id_user',$id)->paginate(5);

            return view('home')->with('posts',$posts);
        }else{
            return redirect('/posts')->with('error','Unauthorized resource');
        }
    }
}

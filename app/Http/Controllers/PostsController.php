<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()){
            
            $followsIds = [];
            foreach(auth()->user()->follows as $follow){
                array_push($followsIds,$follow->followed);
            }

            $ids = $followsIds;
            array_push($ids, auth()->user()->id);

            $posts = Post::whereIn('id_user',$ids)->orderBy('id','desc')->paginate(2);

        }else{
            $posts = Post::orderBy('id','desc')->paginate(2);
        }

        return view('posts.index')->with('posts',$posts);
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()){
            return view('posts.create');
        }else{
            return redirect('/login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(array(
            'title'=>'required',
            'body'=>'required'
        ));
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->id_user = auth()->user()->id;
        $post->save();

        return redirect('/posts')->with('success','Post added !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        if($post->user->id === Auth::user()->id){
            return view('posts.edit')->with('post',$post);
        }else{
            $posts = Post::orderBy('created_at')->get();
            return redirect('/posts')->with(['posts'=>$posts, 'error'=>'Resource not available to you']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $request->validate(array(
            'title'=>'required',
            'body'=>'required'
        ));
        
        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        return redirect('/posts')->with('success','Post updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        $posts = Post::orderBy('created_at')->get();
        return redirect('/posts')->with(['posts'=>$posts,'success'=>'Post deleted']);
    }
}

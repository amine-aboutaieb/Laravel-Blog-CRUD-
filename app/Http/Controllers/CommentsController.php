<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;

class CommentsController extends Controller
{
    public function addComment($id){
        $request = request();

        $request->validate([
            'comment_field'=>'required'
        ]);

        $comment = new Comment();
        $comment->post_id = $id;
        $comment->user_id = auth()->user()->id;
        $comment->body = $request->comment_field;
        $comment->save();
        
        return redirect('/posts')->with('success','Comment added');
    }

    public function removeComment($id){
        if(auth()->user()->id){
            $comment = Comment::findOrFail($id);
            $comment->delete();

            return redirect('/posts')->with('success','Comment removed');
        }else{
            return redirect('/posts')->with('success','Unauthorized resource');
        }
    }
    public function edit($id){
        $comment = Comment::find($id);
        return view('comments.edit')->with('comment',$comment);
    }

    public function update($id){
        $request = request();
        $comment = Comment::find($id);
        $comment->body = $request->body;
        $comment->save();

        return redirect('/posts')->with('success','Comment updated');
    }

}
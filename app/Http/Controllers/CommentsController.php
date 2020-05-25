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
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Follow;
use App\User;

class FollowsController extends Controller
{

    public function addFollow($toFollow){
        $newFollow = new Follow();
        $newFollow->follower = auth()->user()->id;
        $newFollow->followed = $toFollow;
        $newFollow->save();

        $users = User::all();

        return redirect('/users')->with('users',$users);
    }

    public function removeFollow($toUnfollow){
        $userId = auth()->user()->id;
        $target = $toUnfollow;
        $newFollow = Follow::where('follower','=',$userId)->where('followed','=',$target)->get();
        
        $follow = Follow::findOrFail($newFollow[0]->id);
        $follow->delete();

        $users = User::all();
        
        return redirect('/users')->with('users',$users);
    }
}
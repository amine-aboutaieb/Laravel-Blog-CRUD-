<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function index(){
        if(auth()->user()){ 
        $id = auth()->user()->id;
        $users = User::where('id', '<>', $id)->get();
        return view('users.index')->with('users',$users);
        }else{
            $users = User::all();
            return view('users.index')->with('users',$users);
        }

    }

    public function show($id){
        $user = User::findOrfail($id);

        return view('users.show')->with('user',$user);
    }
}

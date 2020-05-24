<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){

        return view('homepage')->with('title','Home page');
    }
    public function about(){
        return view('about')->with('title','About page');
    }
}

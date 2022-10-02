<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class User extends Controller
{
    public function index(){
        return view('index');
    }

    public function posts(){
   
        return view('posts');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Landing_controller extends Controller
{
    public function index(){
        return view('home.index');
    }

    public function about(){
        return view('home.about');
    }
}

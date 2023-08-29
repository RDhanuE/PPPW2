<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class aboutController extends Controller
{
    public function about_view(){
        return view('about', ["name" => "someone", "email" => "something@something"]);
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller 
{
    public function index() 
    {
        return view('frontend.index');
    }

    public function about() 
    {
        return view('frontend.about');
    }

    public function solution() 
    {
        return view('frontend.solution');
    }

    public function privacy() 
    {
        return view('frontend.privacy');
    }
}

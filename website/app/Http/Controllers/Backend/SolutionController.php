<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SolutionController extends Controller 
{
    public function video() 
    {
        return view('backend.solution.video');
    }

    public function content() 
    {
        return view('backend.solution.content');
    }

    public function editcontent($solutionid) 
    {
        return view('backend.solution.editcontent');
    }

    public function aspect() 
    {
        return view('backend.solution.aspect');
    }

    public function addaspect() 
    {
        return view('backend.solution.addaspect');
    }

    public function editaspect($aspectid) 
    {
        return view('backend.solution.editaspect');
    }
}

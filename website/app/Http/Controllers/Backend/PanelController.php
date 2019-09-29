<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PanelController extends Controller 
{
    public function index() 
    {
        return view('backend.index');
    }

    public function login() 
    {
        return view('backend.login');
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Entity\Auth;

class AdminController extends Controller 
{
    public function auth() 
    {
        return view('backend.admin.auth');
    }

    public function addauth(Request $request) 
    {
        if($request->isMethod('post')) {
            
        }

        return view('backend.admin.addauth');
    }

    public function editauth($authid) 
    {
        return view('backend.admin.editauth');
    }
}

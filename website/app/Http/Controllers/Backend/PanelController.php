<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class PanelController extends Controller {
    public function index() {
        return view('backend.index');
    }

    public function login() {
        return view('backend.login');
    }
}

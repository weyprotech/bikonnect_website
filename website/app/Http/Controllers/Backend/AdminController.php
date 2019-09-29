<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class AdminController extends Controller {
    public function auth() {
        return view('backend.admin.auth');
    }

    public function addauth() {
        return view('backend.admin.addauth');
    }

    public function editauth($authid) {
        return view('backend.admin.editauth');
    }
}

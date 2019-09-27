<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class SolutionController extends Controller {
    public function video() {
        return view('backend.solution.video');
    }

    public function content() {
        return view('backend.solution.content');
    }

    public function aspect() {
        return view('backend.solution.aspect');
    }
}

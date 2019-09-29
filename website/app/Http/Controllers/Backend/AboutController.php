<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller 
{
    public function content() 
    {
        return view('backend.about.content');
    }

    public function editcontent($aboutid) 
    {
        return view('backend.about.editcontent');
    }

    public function history() 
    {
        return view('backend.about.history');
    }

    public function addhistory() 
    {
        return view('backend.about.addhistory');
    }

    public function edithistory($historyid) 
    {
        return view('backend.about.edithistory');
    }

    public function team() 
    {
        return view('backend.about.team');
    }

    public function addteam() 
    {
        return view('backend.about.addteam');
    }

    public function editteam($historyid) 
    {
        return view('backend.about.editteam');
    }

    public function partner() 
    {
        return view('backend.about.partner');
    }

    public function addpartner() 
    {
        return view('backend.about.addpartner');
    }

    public function editpartner($partnerid) 
    {
        return view('backend.about.editpartner');
    }
}

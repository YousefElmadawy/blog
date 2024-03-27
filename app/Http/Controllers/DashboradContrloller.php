<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboradContrloller extends Controller
{
    public function index(){
        return view('dashborad.index');
    }
}


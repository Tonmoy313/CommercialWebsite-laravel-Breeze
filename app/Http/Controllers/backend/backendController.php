<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class backendController extends Controller
{
    //Dashboard
    public function dashboard(){
        return view('backend.dashboard');
    }

    
}

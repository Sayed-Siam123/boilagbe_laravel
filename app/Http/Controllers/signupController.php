<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class signupController extends Controller
{
    public function signupRoute(){
        return view('user_signup');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class logout extends Controller
{
    public function logout()
    {
        Session::flush();
        return Redirect::to('/login');
    }
}

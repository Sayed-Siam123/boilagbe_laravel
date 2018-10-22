<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

Session::start();

class indexController extends Controller
{
    public function indexRoute(){
        //echo Session::get('username');
        return view('index');

    }

    public function selldirectoryRoute(){
        echo Session::get('username');

        return view('user_profile_sell_directory');

    }

    public function sellEditRoute(){
        echo Session::get('username');
        return view('user_profile_book_edit_delete');

    }

    public function newBookRoute(){
        echo Session::get('username');
        return view('user_new_book_add');

    }

    public function userProfileEdit(){
        $username= Session::get('username');
        echo $username;
        $sql=DB::table("boi_user_info")->select('user_name','user_location','user_email_address','user_phone_number','user_password')->where('user_email_address',$username)->get();

        return view('user_profile_Edit',compact('sql'));


    }

    public function editProfile(){
        echo Session::get('username');
        $username= Session::get('username');
        echo $username;
        $sql1=DB::table("boi_user_info")->select('user_name','user_location','user_email_address','user_phone_number','user_password')->where('user_email_address',$username)->get();

        return view('user_update_profile_info',compact('sql1'));

    }
}

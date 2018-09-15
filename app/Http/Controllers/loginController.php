<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class loginController extends Controller
{
    public function loginRoute(){
        return view('user_signin');
    }

    public function login(Request $request){

        if($request->login == "Login"){

            $username_data = $request->input('username_login');
            $password_data = $request->input('password_login');

            //echo $username_data;

            $results = DB::table('boi_user_info') -> where(['user_email_address'=>$username_data,'user_password'=>$password_data])->get();

            if(count($results)>0){
                //echo "paisi";
               return Redirect::to('/');
            }

            else
            {
                echo "mile nai";
            }

        }

        else{
            echo "painai";
        }
    }
}

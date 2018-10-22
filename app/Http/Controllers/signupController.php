<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;
Session::start();
class signupController extends Controller
{
    public function signupRoute(){
        return view('user_signup');
    }

    public function signup(Request $request){

        if ($request->submit == "Sign Up"){
            $username = $request->input("user_name");
            $location = $request->input("user_location");
            $phoneNumber = $request->input("user_phonenumber");
            $email = $request->input("user_emailAddress");
            $password = $request->input("user_password");
            $check_password = $request->input("check_password");

            if($password==$check_password){

                $data = array('user_name'=>$username,'user_location'=>$location,'user_phone_number'=>$phoneNumber,
                             'user_email_address'=>$email,'user_password'=>$password);

                DB::table("boi_user_info") ->insert($data);
                return Redirect::to("/login");

            }

            else{
                echo "password milenai";
            }

        }

        else{
            echo "painai";
        }

    }
}

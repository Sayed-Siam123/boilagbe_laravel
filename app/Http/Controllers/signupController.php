<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Session;
Session::start();
class signupController extends Controller
{

    public function signup(Request $request){

        if ($request->submit == "Sign Up"){
            $username = $request->input("user_name");
            $location = $request->input("user_location");
            $phoneNumber = $request->input("user_phonenumber");
            $email = $request->input("user_emailAddress");
            $password = $request->input("user_password");
            $hashPassword = md5($password);
            $check_password = $request->input("check_password");

            if($password==$check_password){

                /*$data = array('user_name'=>$username,'user_location'=>$location,'user_phone_number'=>$phoneNumber,
                             'user_email_address'=>$email,'user_password'=>$hashPassword);

                DB::table("boi_user_info") ->insert($data);
                return Redirect::to("/login");*/
                $check = DB::table('boi_user_info')
                    ->where('boi_user_info.user_email_address','=',$email)
                    ->get();

                if(count($check)>0){

                    Session::put('signup_page_message','Email Exist. Use another email ID!!');
                    return Redirect::to('/signup');

                }
                else
                {
                    $data = array('user_name'=>$username,'user_location'=>$location,'user_phone_number'=>$phoneNumber,
                        'user_email_address'=>$email,'user_password'=>$hashPassword);

                    DB::table("boi_user_info") ->insert($data);
                    \Illuminate\Support\Facades\Session::put('login_page_message','Congratualtions. Please LogIn');
                    return Redirect::to("/login");

                }

            }

            else{
                Session::put('signup_page_message','Password did not match. Try Again!');
                return Redirect::to('/signup');
            }

        }

        else{
            echo "painai";
        }

    }
}

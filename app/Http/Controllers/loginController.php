<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use function Sodium\compare;

Session::start();

class loginController extends Controller
{

    public function login(Request $request)
    {

        if ($request->login == "Login") {

            $username_data = $request->input('username_login');
            $password_data = $request->input('password_login');

            $md5checkPW = md5($password_data);

            $results = DB::table('boi_user_info')
                ->select('user_email_address','user_password')
                ->where('user_email_address','=', $username_data)
                ->where('user_password','=',$md5checkPW)
                ->get();

            if (count($results) > 0) {
                //echo "paisi";

                Session::put('username', $username_data);
                $result=DB::table("boi_user_info")->select('id','avatar')->where('user_email_address','=',$username_data)->get();
                foreach ($result as $record)
                {
                    $avatar_data=$record->avatar;
                    $id = $record -> id;
                    Session::put('avatar',$avatar_data);
                    Session::put('id',$id);
                }
                //Session::put('avatar',$result);
                return Redirect::to('/');

            } else {
                Session::put('login_page_message','Invalid Email or Password!!');
                return Redirect::to('/login');
            }

        }
        else {
                echo "painai";
            }

        }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use function Sodium\compare;

Session::start();

class loginController extends Controller
{
    public function loginRoute(){
        return view('user_signin');
    }

    public function login(Request $request)
    {

        if ($request->login == "Login") {

            $username_data = $request->input('username_login');
            $password_data = $request->input('password_login');

            //echo $username_data;

            $results = DB::table('boi_user_info')->where(['user_email_address' => $username_data, 'user_password' => $password_data])->get();

            if (count($results) > 0) {
                //echo "paisi";

                Session::put('username', $username_data);
                Session::put('password', $password_data);
                $result=DB::table("boi_user_info")->select('id','avatar')->where('user_email_address',$username_data)->get();
                foreach ($result as $record)
                {
                    $avatar_data=$record->avatar;
                    $id = $record -> id;
                    Session::put('avatar',$avatar_data);
                    Session::put('id',$id);
                }
                //Session::put('avatar',$result);
                return Redirect::to('/user_profile_sell_directory');

            } else {
                echo "mile nai";
            }

        } else {
            echo "painai";
        }

    }
}

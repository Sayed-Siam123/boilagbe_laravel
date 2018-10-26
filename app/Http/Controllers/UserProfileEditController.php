<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\PackageManifest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;
use phpDocumentor\Reflection\DocBlock\Tags\See;

Session::start();

class UserProfileEditController extends Controller
{
    public function propic_upload(Request $request)
    {

        //echo Session::get('username');

        if ($request->login == "submit") {
            //echo "hoise";

               $this->validate($request,['image' => 'required|image|mimes:jpeg,png,jpg,JPG,gif,svg|max:2048']);

            if ($request->hasFile('image')){
                $username = Session::get('username');
                $id_data = Session::get('id');
                $image = $request -> file('image');
                $name = $id_data. mt_rand(0,100) . '.' .$image->getClientOriginalExtension();
                $image_resize = Image::make($image->getRealPath());
                $image_resize->resize(300,300);
                $destination = public_path('/ProPicture');
                $image_resize->save($destination.'/'.$name);

                echo $name;
                //echo Session::get('id');

                DB::table('boi_user_info')->where('user_email_address',$username)
                          ->update(['avatar' => $name]);

                $result=DB::table("boi_user_info")->select('avatar')->where('user_email_address',$username)->get();
                foreach ($result as $record) {
                    $avatar_data = $record->avatar;
                    Session::put('avatar', $avatar_data);
                }


                return Redirect::to('/user_profile_sell_directory');


            }

            else
            {
                echo "file painai";
            }
        }
        else
        {
            echo "hoy nai!";
        }
    }

    public function editprofileDB(Request $request){

        if($request->submit = 'Update'){
            $username = Session::get('username');
            $location = $request->input("user_location");
            $phoneNumber = $request->input("user_phonenumber");
            $password = $request->input("user_password");
            $check_password = $request->input("check_password");

            if($password == $check_password){

                echo "password milse";
                DB::table('boi_user_info')->where('user_email_address',$username)
                    ->update(['user_location' => $location,'user_phone_number' => $phoneNumber,'user_password' => $password]);

                return Redirect::to('/user_Profile_Edit');

            }

            else
            {
                echo "password not match";
            }

        }

        else
        {
            echo "pai nai";
        }

    }


}

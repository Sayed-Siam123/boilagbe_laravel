<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\PackageManifest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
                $username = Auth::user()->email;
                $id_data = Auth::id();
                $image = $request -> file('image');
                $name = $id_data. mt_rand(0,100) . '.' .$image->getClientOriginalExtension();
                $image_resize = Image::make($image->getRealPath());
                $image_resize->resize(300,300);
                $destination = public_path('/ProPicture');
                $image_resize->save($destination.'/'.$name);

//                echo $name;
                //echo Session::get('id');

                DB::table('users')->where('email',$username)
                          ->update(['avatar' => $name]);

                $result=DB::table("users")->select('avatar')->where('email',$username)->get();
                foreach ($result as $record) {
                    $avatar_data = $record->avatar;
                    Session::put('avatar', $avatar_data);
                }


                return Redirect::to('/');


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
            $username = Auth::user()->email;
            $location = $request->input("user_location");
            $phoneNumber = $request->input("user_phonenumber");


                DB::table('users')
                    ->where('email',$username)
                    ->update(['location' => $location,'phone' => $phoneNumber]);

                return Redirect::to('/user_Profile_Edit');

            }

        else
        {
            echo "pai nai";
        }

    }

    public function user_change_password(Request $request){

        if($request->submit = 'Change Password'){



            $oldpassword = $request->input('old_password');
            $newpassword = $request->input('user_new_password');
            $checkpassword = $request->input('user_confirm_password');

            if(strlen($newpassword)>=6){
                if($newpassword == $checkpassword){

                    $sql = DB::table('users')
                        ->select('password')
                        ->where('users.id',Auth::id())->get();

                    foreach ($sql as $row){

                        $hashPassword = $row->password;
                        if (Hash::check($oldpassword,$hashPassword)){

                            $update_sql = DB::table('users')
                                ->update(['password' => Hash::make($newpassword)]);

                            Session::put('user_change_password_page','Password Changed Successfully!!');
                            return Redirect::to('user_Profile_Edit');

                        }
                        else{
                            Session::put('user_change_password_page','Your Old Password doesnt matched!!');
                            return Redirect::to('change_password');
                        }

                    }

                }

                else{
                    Session::put('user_change_password_page','Password doesnt matched!!');
                    return Redirect::to('change_password');
                }
            }
            else
            {
                Session::put('user_change_password_page','New Password should have min 6 characters!!');
                return Redirect::to('change_password');
            }

        }

    }


}

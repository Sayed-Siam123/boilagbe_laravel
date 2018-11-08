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
        $res1=DB::table('boi_book_details')
            ->select('boi_book_details.sell_book_name','boi_book_details.id','boi_book_details.sell_book_author','boi_book_details.sell_book_condition')
            ->join('boi_user_info','boi_user_info.id','=','boi_book_details.user_id')
            ->join('user_upload_post_pic','boi_book_details.id','=','user_upload_post_pic.post_id')
            ->distinct()
            ->get();


        return view('index',compact('res1'));


    }


    public function selldirectoryRoute(){
        //echo Session::get('username');

        return view('user_profile_sell_directory');

    }

    public function sellbookdetailsRoute(){
        //echo Session::get('username');
        return view('sell_book_details');

    }

    public function newBookRoute(){
        //echo Session::get('username');
        return view('user_new_book_add');

    }

    public function userProfileEdit(){
        $username= Session::get('username');
        //echo $username;
        $sql=DB::table("boi_user_info")->select('user_name','user_location','user_email_address','user_phone_number','user_password')->where('user_email_address',$username)->get();

        return view('user_profile_Edit',compact('sql'));


    }

    public function editProfile(){
        //echo Session::get('username');
        $username= Session::get('username');
        //echo $username;
        $sql1=DB::table("boi_user_info")->select('user_name','user_location','user_email_address','user_phone_number','user_password')->where('user_email_address',$username)->get();

        return view('user_update_profile_info',compact('sql1'));

    }

    public function wanttobuy(Request $request)
    {

        if ($request->login == "Submit") {
            if (Session::get('username')) {

                $id = Session::get('id');
                $spostID = $request->input('selectPostId');

                $respond = DB::table('boi_book_details')
                    ->select('boi_book_details.sell_book_name', 'boi_book_details.id', 'boi_book_details.sell_book_author', 'boi_book_details.sell_book_condition',
                        'boi_book_details.sell_book_edition','boi_book_details.sell_book_price','boi_book_details.sell_book_delivary_location','boi_user_info.user_email_address','boi_book_details.sell_book_phone_number')
                    ->join('boi_user_info', 'boi_user_info.id', '=', 'boi_book_details.user_id')
                    ->join('user_upload_post_pic', 'boi_book_details.id', '=', 'user_upload_post_pic.post_id')
                    ->where('user_upload_post_pic.post_id', $spostID)
                    ->distinct()
                    ->get();

                $respond1 = DB::table('user_upload_post_pic')
                    ->select('pic_name')
                    ->join('boi_user_info', 'boi_user_info.id', '=', 'user_upload_post_pic.user_id')
                    ->join('boi_book_details', 'boi_book_details.id', '=', 'user_upload_post_pic.post_id')
                    ->where('user_upload_post_pic.post_id', $spostID)
                    ->distinct()
                    ->get();

                return view('sell_book_details', compact('respond','respond1'));


            }

            else {

                return Redirect::to('/login');

            }


        }

        else{
            echo "nothing found";
        }
    }

    public function indexrequestRoute(){
        return view('/index_request');
    }

}

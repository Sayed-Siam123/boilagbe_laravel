<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

Session::start();

class indexController extends Controller
{
    public function indexRoute(){
        //echo Session::get('username');
        /*$res1=DB::table('boi_book_details')
            ->select('boi_book_details.sell_book_name','boi_book_details.id','boi_book_details.sell_book_author','boi_book_details.sell_book_condition',
                'boi_book_details.sell_book_sell_status','user_upload_post_pic.pic_name')
            ->join('users','users.id','=','boi_book_details.user_id')
            ->join('user_upload_post_pic','user_upload_post_pic.post_id','=','boi_book_details.id')
            ->where('boi_book_details.sell_book_sell_status','1')
            ->orderBy('id', 'asc')
            ->distinct()
            ->get();*/

        $res1=DB::table('boi_book_details')
            ->select('boi_book_details.sell_book_name','boi_book_details.id','boi_book_details.sell_book_author','boi_book_details.sell_book_condition','boi_book_details.sell_book_sell_status')
            ->join('users','users.id','=','boi_book_details.user_id')
            ->join('user_upload_post_pic','boi_book_details.id','=','user_upload_post_pic.post_id')
            ->where('boi_book_details.sell_book_sell_status','1')
            ->distinct()
            ->get();


        $img=DB::table('user_upload_post_pic')
          ->select('user_upload_post_pic.user_id','user_upload_post_pic.post_id','user_upload_post_pic.pic_name')
          ->leftJoin('boi_book_details','boi_book_details.id','=','user_upload_post_pic.post_id')
          ->leftJoin('users','users.id','=','boi_book_details.user_id')
          ->where('boi_book_details.sell_book_sell_status','1')
          ->groupBy('user_upload_post_pic.post_id')
          ->get();



        /*$img=DB::table('users')
            ->groupBy('id')
            ->having('id', '<', 100)
            ->get();




        foreach ($img as $row){

            echo $row->id;

        }*/

        $res2 = DB::table('request_boi_book_details')
            ->select('request_boi_book_details.request_book_name',
                'request_boi_book_details.id',
                'request_boi_book_details.request_book_author',
                'request_boi_book_details.request_book_condition',
                'request_boi_book_details.request_book_receive_location',
                'request_boi_book_details.request_book_edition',
                'request_boi_book_details.sell_book_sell_status as status')
            ->join('users', 'users.id', '=', 'request_boi_book_details.user_id')
            ->where('request_boi_book_details.sell_book_sell_status','1')
            ->distinct()
            ->get();


        return view('index',compact('res1','res2','img'));


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

        $username= Auth::user()->email;
        //echo $username;
        $sql=DB::table("users")->select('name','location','email','phone','password')->where('email',$username)->get();

        return view('user_profile_Edit',compact('sql'));


    }

    public function editProfile(){
        //echo Session::get('username');
        $username= Auth::user()->email;

        $sql1=DB::table("users")->select('name','location','email','phone','password')->where('email',$username)->get();

        return view('user_update_profile_info',compact('sql1'));

    }

    public function wanttobuy(Request $request)
    {

        if ($request->login == "Submit") {
            if (Auth::id()) {


                $spostID = $request->input('selectPostId');


                $respond = DB::table('boi_book_details')
                    ->select('boi_book_details.sell_book_name',
                        'boi_book_details.id',
                        'boi_book_details.sell_book_author',
                        'boi_book_details.sell_book_condition',
                        'boi_book_details.sell_book_edition',
                        'boi_book_details.sell_book_price',
                        'boi_book_details.sell_book_delivary_location',
                        'users.email',
                        'boi_book_details.sell_book_phone_number')
                    ->join('users', 'users.id', '=', 'boi_book_details.user_id')
                    ->join('user_upload_post_pic', 'boi_book_details.id', '=', 'user_upload_post_pic.post_id')
                    ->where('user_upload_post_pic.post_id', $spostID)
                    ->distinct()
                    ->get();

                $respond1 = DB::table('user_upload_post_pic')
                    ->select('pic_name')
                    ->join('users', 'users.id', '=', 'user_upload_post_pic.user_id')
                    ->join('boi_book_details', 'boi_book_details.id', '=', 'user_upload_post_pic.post_id')
                    ->where('user_upload_post_pic.post_id', $spostID)
                    ->distinct()
                    ->get();

                return view('sell_book_details', compact('respond','respond1'));

            }

            else {

                return Redirect::to('login');

            }


        }

        else{
            echo "nothing found";
        }
    }

    public function indexrequestRoute()
    {
        $id = Auth::id();
        //$username = Auth::user()->name;
        if (Auth::check()) {
            $res = DB::table('request_boi_book_details')
                ->select('request_boi_book_details.request_book_name', 'request_boi_book_details.id', 'request_boi_book_details.request_book_author', 'request_boi_book_details.request_book_condition', 'request_boi_book_details.request_book_receive_location', 'request_boi_book_details.sell_book_sell_status as status')
                ->join('users', 'users.id', '=', 'request_boi_book_details.user_id')
                ->where('request_boi_book_details.user_id', $id)
                ->distinct()
                ->get();


            return view('/index_request', compact('res'));
        }

        else{
            return \redirect('login');
        }

    }

    public function book_request_add(){
        return view('user_book_request');
    }

    public function changepass(){
        return view('user_change_password');
    }

}

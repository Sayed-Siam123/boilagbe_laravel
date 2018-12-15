<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class RetrievingDataFromDB extends Controller
{
    public function SellItem()
    {

        $id = Auth::id();
        //$username = Auth::user()->name;
        if(Auth::check()) {


            $res = DB::table('boi_book_details')
                ->select('boi_book_details.sell_book_name', 'boi_book_details.id', 'boi_book_details.sell_book_author', 'boi_book_details.sell_book_condition', 'boi_book_details.sell_book_sell_status as status')
                ->join('users', 'users.id', '=', 'boi_book_details.user_id')
                ->join('user_upload_post_pic', 'boi_book_details.id', '=', 'user_upload_post_pic.post_id')
                ->where('user_upload_post_pic.user_id', $id)
                ->distinct()
                ->get();

            $img = DB::table('user_upload_post_pic')
                ->select('pic_name')
                ->join('users','users.id','=','user_upload_post_pic.user_id')
                ->join('boi_book_details','boi_book_details.id','=','user_upload_post_pic.post_id')
                ->where('user_upload_post_pic.user_id',Auth::id())
                ->limit('1')
                ->get();


            return view('/user_profile_book_edit_delete', compact('res','img'));
        }
        else
        {
            return redirect('login');
        }

    }

    /*public function postImage()
    {

        $id = Session::get('id');

        $respond1 = DB::table('user_upload_post_pic')
            ->select('pic_name')
            ->join('boi_user_info', 'boi_user_info.id', '=', 'user_upload_post_pic.user_id')
            ->join('boi_book_details', 'boi_book_details.id', '=', 'user_upload_post_pic.post_id')
            ->where('user_upload_post_pic.user_id', $id)
            ->distinct()
            ->get();


        return view('sell_book_details', compact('respond1'));

    }*/

}

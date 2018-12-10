<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

Session::start();

class RequestBookController extends Controller
{
    public function book_request_post(Request $request){

        if ($request->login == "Submit"){
            $bookname = $request->input("bookName");
            $authorname = $request->input("author");
            $bookedition = $request->input("edition");
            $bookcondition = $request->input("book_condition");
            $deliverylocation = $request->input("deliveryLocation");

            $id = Auth::id();
            $username = Auth::user()->name;

            $data = array('user_id'=>$id,'request_book_name'=>$bookname,'request_book_author'=>$authorname,'request_book_edition'=>$bookedition,
                'request_book_condition'=>$bookcondition,'request_book_receive_location'=>$deliverylocation,'sell_book_sell_status'=>'1');

            DB::table('request_boi_book_details')->insert($data);
            Session::put('index_request_message','Request Added Successfully');
            return Redirect::to('/IndexRequests');


        }
        else
        {
            echo "painai";
        }

    }

}

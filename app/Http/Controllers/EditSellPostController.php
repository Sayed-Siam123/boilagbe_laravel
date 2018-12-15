<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class EditSellPostController extends Controller
{

    public function editPost(Request $request){

        if(Auth::check()) {
            $postID = $request->input('selectPostId_inSell');

            $respond = DB::table('boi_book_details')
                ->select('boi_book_details.sell_book_name as name', 'boi_book_details.id as id', 'boi_book_details.sell_book_author as author', 'boi_book_details.sell_book_condition as condition',
                    'boi_book_details.sell_book_edition as edition', 'boi_book_details.sell_book_price as price', 'boi_book_details.sell_book_delivary_location as location', 'users.email', 'boi_book_details.sell_book_phone_number as number', 'boi_book_details.sell_book_sell_status as status')
                ->join('users', 'users.id', '=', 'boi_book_details.user_id')
                ->join('user_upload_post_pic', 'boi_book_details.id', '=', 'user_upload_post_pic.post_id')
                ->where('user_upload_post_pic.post_id', $postID)
                ->distinct()
                ->get();


            return view('user_sell_book_update', compact('respond'));
        }

        else{
            return \redirect('login');
        }

    }


    public function bookUpdate(Request $request){

         if($request->login == "Submit"){


             $book_name = $request->input('bookName');
             $author_name = $request->input('authorName');
             $book_condition = $request->input('book_condition');
             $book_edition = $request->input('bookEdition');
             $book_price = $request->input('bookPrice');
             $delivery_location = $request->input('bookDeliveryLocation');
             $number = $request->input('phonenumber');

             $postID = $request->input('selectPostId_inUpdate');

             DB::table('boi_book_details')
                 ->where('id',$postID)
                 ->update(['sell_book_name' => $book_name,
                           'sell_book_author' => $author_name,
                           'sell_book_edition' => $book_edition,
                           'sell_book_condition' =>$book_condition,
                           'sell_book_delivary_location'=>$delivery_location,
                           'sell_book_price'=>$book_price,
                           'sell_book_phone_number'=>$number]);

             return Redirect::to('/user_profile_book_edit_delete');

        }

    }


}

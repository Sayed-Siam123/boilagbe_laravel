<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class DeleteSellPostController extends Controller
{

    public function deletePost(Request $request){

        if (Auth::check()) {
            $postID = $request->input('selectPostId_inSell');

            DB::table('boi_book_details')
                ->where('id', $postID)
                ->update(['sell_book_sell_status' => '0']);

            return Redirect::to('/user_profile_book_edit_delete');
        }
        else{
            return \redirect('login');
        }

    }



}

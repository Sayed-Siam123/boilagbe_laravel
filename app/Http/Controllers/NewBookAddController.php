<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\PackageManifest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;
use phpDocumentor\Reflection\Types\Integer;

Session::start();

class NewBookAddController extends Controller
{
    public function addBook(Request $request)
    {



        if ($request->login == "submit") {


            $bookname = $request->input("bookName");
            $authorname = $request->input("authorName");
            $bookcondition = $request->input("book_condition");
            $bookedition = $request->input("bookEdition");
            $deliverylocation = $request->input("bookDeliveryLocation");
            $phonenumber = $request->input("phonenumber");
            $bookprice = $request->input("bookPrice");
            $imagename= "sasa.jpg";

            $id = Session::get('id');
            $username = Session::get('username');

            $data = array('user_id'=>$id,'sell_book_name'=>$bookname,'sell_book_author'=>$authorname,'sell_book_edition'=>$bookedition,
                'sell_book_condition'=>$bookcondition,'sell_book_delivary_location'=>$deliverylocation,'sell_book_sell_status'=>'1',
                'sell_book_phone_number'=>$phonenumber,'sell_book_price'=>$bookprice);


            /*$res=DB::table('boi_book_details')
                ->select('id')
                ->join('boi_user_info','boi_user_info.id','=','boi_book_details.user_id')
                ->where('user_id',$id)
                ->orderBy('id','desc')
                ->limit(1)
                ->get();

            echo $res;*/  //by using this,I can search in two table using ids


            /*if($res){
                DB::table('boi_book_details')->insert($data);

            }*/

            /*$results = DB::select( DB::raw("SELECT 'user_id','id' FROM 'boi_book_details' u,'boi_user_info' v WHERE u.user_id=v.id AND user_id = :somevariable"), array(
                'somevariable' => $id
            ));*/


            DB::table('boi_book_details')->insert($data);


            $res=DB::table('boi_book_details')
                ->select('id')
                ->where('user_id',$id)
                ->orderByDesc('id')
                ->limit(1)
                ->get();

            foreach ($res as $result) {
                $d = $result-> id;
                Session::put('post_id',$d);
                //echo $d;  //latest post id putting on session
            }

            $this->validate($request,[
                'attachment' => 'required',
                'attachment.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);

            $post_id = Session::get('post_id');
            $counter = 0;

            $image = $request->file('attachment');

            if ($request->hasFile('attachment')) {



                foreach ($image as $files){



                    $counter++;

                    if($counter<4){

                        $name = $id. $post_id . $counter . '.' .$files->getClientOriginalExtension();
                        $image_resize = Image::make($files->getRealPath());
                        $image_resize->resize(300,300);
                        $destination = public_path('/book');
                        $image_resize->save($destination.'/'.$name);

                        $data1 = array('user_id'=>$id,'post_id'=>$post_id,'pic_name'=>$name);

                        DB::table('user_upload_post_pic')->insert($data1);

                    }

                    else{
                        echo "File beshi hoye gese";
                    }

                }

                //echo $counter;
            }

            return Redirect::to('/user_profile_book_edit_delete');


        }

        else {
            echo "nai";
        }

    }


}

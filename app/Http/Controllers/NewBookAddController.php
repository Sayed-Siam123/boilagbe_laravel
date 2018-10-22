<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;

Session::start();

class NewBookAddController extends Controller
{
    public function addBook(Request $request){

        if ($request ->login == "submit"){

            echo Session::get('username');
            $username = Session::get('username');

            $this->validate($request,['image_name' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);

           if ($request->hasFile('image_name')){

               echo "pic paisi";
               $image = $request -> file('image_name');
               $name = $username. '.' .$image->getClientOriginalExtension();
               $image_resize = Image::make($image->getRealPath());
               $image_resize->resize(300,300);
               $destination = public_path('/book');
               $image_resize->save($destination.'/'.$name);



           }

           else{
               echo "pic paini";
           }


        }

        else{
            echo "paini";
        }

    }
}

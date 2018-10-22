<?php

namespace App\Providers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        /*view()->composer('header',function ($view){
            $username= Session::get('username');
            $avatar_data = DB::table("boi_user_info")->select('avatar')->where('user_email_address', $username)->get();
            $view->headerData = $avatar_data;
        });*/


    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

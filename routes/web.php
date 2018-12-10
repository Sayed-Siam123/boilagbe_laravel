<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


\Illuminate\Support\Facades\Route::get('/','indexController@indexRoute');
\Illuminate\Support\Facades\Route::get('/user_profile_sell_directory','indexController@selldirectoryRoute');
\Illuminate\Support\Facades\Route::get('/user_profile_book_edit_delete','RetrievingDataFromDB@SellItem');
\Illuminate\Support\Facades\Route::get('/user_new_book_add','indexController@newBookRoute');
//\Illuminate\Support\Facades\Route::get('/login','loginController@loginRoute');
//\Illuminate\Support\Facades\Route::get('/signup','signupController@signupRoute');
\Illuminate\Support\Facades\Route::get('/user_Profile_Edit','indexController@userProfileEdit');
\Illuminate\Support\Facades\Route::get('/user_update_profile_info','indexController@editProfile');
\Illuminate\Support\Facades\Route::get('/logout','logout@logout');
\Illuminate\Support\Facades\Route::get('/wanttobuy','indexController@wanttobuy');
\Illuminate\Support\Facades\Route::get('/sellbookdetails','indexController@sellbookdetailsRoute');
\Illuminate\Support\Facades\Route::get('/IndexRequests','indexController@indexrequestRoute');
\Illuminate\Support\Facades\Route::get('/editBookinSell','EditSellPostController@editPost');
\Illuminate\Support\Facades\Route::get('/deleteBookinSell','DeleteSellPostController@deletePost');
\Illuminate\Support\Facades\Route::get('/user_request_book_add','indexController@book_request_add');



\Illuminate\Support\Facades\Route::post('/book_request','RequestBookController@book_request_post');
\Illuminate\Support\Facades\Route::post('/updateBook','EditSellPostController@bookUpdate');
\Illuminate\Support\Facades\Route::post('/loginDB','loginController@login');
\Illuminate\Support\Facades\Route::post('/signupDB','signupController@signup');
\Illuminate\Support\Facades\Route::post('/newbookDB','NewBookAddController@addBook');
\Illuminate\Support\Facades\Route::post('/pro_pic','UserProfileEditController@propic_upload');
\Illuminate\Support\Facades\Route::post('/UserProfile','UserProfileEditController@editprofileDB');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

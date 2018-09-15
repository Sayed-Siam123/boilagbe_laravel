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
\Illuminate\Support\Facades\Route::get('/login','loginController@loginRoute');
\Illuminate\Support\Facades\Route::get('/signup','signupController@signupRoute');
\Illuminate\Support\Facades\Route::post('/loginDB','loginController@login');


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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'HomeController@index');

Route::get('register', 'RegisterController@index');

Route::post('register', 'RegisterController@register');

Route::get('login', 'LoginController@index');

Route::post('login', 'LoginController@login');

Route::post('getDistrict','MasterController@getDistrict');

Route::post('getSubdistrict','MasterController@getSubdistrict');

Route::get('search-tour/{country_id}','FilterController@search_tour');

Route::get('adminlogin','LoginController@adminLogin');

Route::get('dashboard','AdminController@dashboard');
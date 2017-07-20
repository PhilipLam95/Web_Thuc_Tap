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

Route::get('/',
	['as'=>'index',
	'uses'=>'HomeController@getIndex']);

Route::get('contact',
	['as'=>'contact',
	'uses'=>'HomeController@getContact']);

Route::get('introduce',
	['as'=>'introduce',
	'uses'=>'HomeController@getIntroduce']);

Route::get('all_product',
	['as'=>'new_product',
	'uses'=>'HomeController@getProduct']);

Route::get('detail/{id}',
	['as'=>'detail',
	'uses'=>'HomeController@getDetail']);


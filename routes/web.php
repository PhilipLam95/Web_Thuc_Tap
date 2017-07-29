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
		//--------------------Liên Hệ------------------------------
		Route::get('contact',
			['as'=>'contact',
			'uses'=>'HomeController@getContact']);
		//--------------------------------------------------

		//--------------------Gioi thiệu------------------------------
		Route::get('introduce',
			['as'=>'introduce',
			'uses'=>'HomeController@getIntroduce']);
		//--------------------Show  sản phẩm------------------------------

		Route::get('all_product',
			['as'=>'new_product',
			'uses'=>'HomeController@getProduct']);


		//-------------------Chi tiết sản phẩm-------------------------------
		Route::get('detail/{id}',
			['as'=>'detail',
			'uses'=>'HomeController@getDetail']);
		//--------------------------------------------------

		//---------------------Loại sản phẩm con-----------------------------
		Route::get('type/{id}',
			['as'=>'type',
			'uses'=>'ProductController@getTypeProDuct']);
		//--------------------------------------------------

		//--------------------Loại sản phẩm từng nội thất------------------------------
		Route::get('type_par/{id}',
			['as'=>'type_par',
			'uses'=>'ProductController@getTypeProDuctByIdPar']);
		//--------------------------------------------------

		//---------------------Tìm kiếm sản phẩm -------------------------------------
		Route::get('search',
			['as'=>'search',
			'uses'=>'HomeController@getFind']);

		Route::post('search',
			['as'=>'search',
			'uses'=>'HomeController@postFind']);

		//----------------------------------------------------------------------------
		//----------------------Đăng ký----------------------------
		Route::get('register',
			['as'=>'register',
			'uses'=>'UserController@Register']);

		Route::post('register',
			['as'=>'register',
			'uses'=>'UserController@postRegister']);

		Route::get('send-to-mail/{id}/{token}', 
			['as'=>'send-to-mail',
			'uses'=>'UserController@activeUser']);
		//--------------------------------------------------
		 

		//--------------------Đăng Nhập---------------------
		Route::get('signin',
			['as'=>'signin',
			'uses'=>'UserController@getSignin']);

		Route::post('signin',
			['as'=>'signin',
			'uses'=>'UserController@postSignin']);
		//---------------------------------------------------------------------------


		//-------------------- Đăng nhập bằng facebook ------------------------------
		Route::get('loginFaceBook/{provider}',[
			'as'=>'provider_login',
			'uses'=>'UserController@redirectToProvider']);

		Route::get('loginFaceBook/{provider}/callback', [
			'as'=>'provider_login_callback',
			'uses'=>'UserController@handleProviderCallback']);
		//---------------------------------------------------------------------------

		//--------------------Đăng Xuất---------------------

		Route::get('logout',
			['as'=>'logout',
			 'uses'=>'UserController@logout']);
		//---------------------------------------------------------------------------

		//--------------------Mua Hàng---------------------
		Route::get('buy/{id}',
			['as'=>'buy',
			 'uses'=>'CartController@buy']);
		//---------------------------------------------------------------------------
		//-------------------- Xóa  1 item sản phẩm---------------------
		Route::get('delete-item-cart/{id}',
			['as'=>'delete-item-cart',
			 'uses'=>'CartController@deleteItemCart']);
		//---------------------------------------------------------------------------
		//-----------------giam 1 san pham----------------------------
		Route::get('delete-1-item/{id}',
			['as'=>'delete-1-item',
			'uses'=>'CartController@reduceByOne']);
		//---------------------------------------------------------------------------
		//-----------------tang 1 san pham----------------------------
		Route::get('rise-1-item/{id}',
			['as'=>'rise-1-item',
			'uses'=>'CartController@riseByOne']);
		//---------------------------------------------------------------------------

		//-----------------Xóa giỏ hàng----------------------------
		Route::get('delete-all-cart',
			['as'=>'delete-all-cart',
			'uses'=>'CartController@DeleteAllCart']);
		//---------------------------------------------------------------------------

		//--------------------chi tiết giỏ hàng---------------------
		Route::get('cart_detail',
			['as'=>'cart_detail',
			 'uses'=>'CartController@show_cart']);
		//---------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------------------------
Route::group(['prefix' => 'dashboard'],function()  // 
{
	Route::get('select_typechild/{id}',['as'=>'select_typechild','uses'=>'CategoryController@typechild']);// lay loai san pham theo noi that
});


//---------------------------------Trang Quan Trị----------------------------------------


	//------------------------Login Manager--------------------------
	Route::get('manager',
		['as'=>'manager',
		 'uses'=>'AdminController@loginManager']);
		
	Route::post('manager',
		['as'=>'manager',
		'uses'=>'AdminController@postloginManager']);

	//--------------------------------------------------


	//------------------Show sản phẩm-------------------------------


	//--------------------------------------------------------------\


	Route::group(['prefix' => 'dashboard','middleware' => 'employee'], function() 
	{
		Route::get('process',['as'=>'process','uses'=>'AdminController@ViewProcess']);
		Route::get('list_products',['as'=>'list_products','uses'=>'ProductController@getProduct']);
		

		Route::get('product/{id}/approve',['as'=>'accept_pro','uses'=>'ProductController@acceptProduct']);
    	Route::get('product/{id}/unapprove',['as'=>'unaccept_pro','uses'=>'ProductController@unacceptProduct']);
		Route::post('product/add',['as'=>'addProDuct','uses'=>'ProductController@postAdd']);
		Route::get('product/{id}/remove',['as'=>'deletePro','uses'=>'ProductController@remove']);


			//------------------------------------kho-------------------------------------// 
		Route::get('warehouse',['as'=>'warehouse','uses'=>'ImportController@getProduct']);
			//Them san moi vao kho
		Route::get('warehouse/add',['as'=>'getadd_new_wareproduct','uses'=>'ImportController@getAdd']);
		Route::post('warehouse/add',['as'=>'postadd_new_wareproduct','uses'=>'ImportController@postAdd']);
			//-------------------

		// Route::get('warehouse/add/id',['as'=>'add_old_wareproduct','uses'=>'ImportController@']);//Nhập thêm số lượng cho sản phẩm cũ
	});



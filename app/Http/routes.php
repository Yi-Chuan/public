<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('Home.index');
// });

Route::get('/','Home\IndexController@index');

//详情页
Route::get('/goods','Home\GoodsController@index');

//前台注册
Route::get('/register','Home\LoginController@register');
Route::get('/sendVcode','Home\LoginController@sendVcode');

Route::get('/goods/show/{id}','Admin\GoodsController@Show');


//后台路由组,登录后才可以
// Route::group(['middleware' => 'ALogin'],function(){
	//后台首页
	Route::get('/admin/index','Admin\AdminController@index');
	//隐式控制器路由
	//后台用户管理 /a/users   http://lamp178.cn/a/users
	Route::controller('/admin/user','Admin\UserController');
	//后台分类管理
	Route::controller('/admin/cate','Admin\CateController');
	//后台商品管理
	Route::controller('/admin/goods','Admin\GoodsController');
// });

//后台登录
Route::get('/admin/login','Admin\LoginController@login');
Route::post('/admin/dologin','Admin\LoginController@dologin');

//验证码
Route::get('/vcode','Admin\LoginController@createyzm');

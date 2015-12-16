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
    // return view('welcome');
// });

Route::get('/','Home\IndexController@index');

Route::resource('/activity','Home\ActivityController');

Route::resource('/associate','Home\AssociateController');

Route::resource('/comment','Home\CommentController');
//后台登录页面
Route::get('admin/login','Admin\LogController@login');
//后台登录验证
Route::post('admin/checklogin','Admin\LogController@checklogin');
	
Route::group(['prefix'=>'admin','middleware'=>'logincheck'],function(){
	
	//后台首页frame框架
	Route::get('index','Admin\IndexController@index');
	Route::get('index/top','Admin\IndexController@top');
	Route::get('index/foot','Admin\IndexController@foot');
	Route::get('index/left','Admin\IndexController@left');
	Route::get('index/sysinfo','Admin\IndexController@sysinfo');
	
	//权限模块资源控制器
	Route::resource('auth','Admin\AuthController');
	//Route::get('auth/?page={id}', 'Admin\AuthController@index');
	
	//角色模块资源控制器
	Route::resource('role','Admin\RoleController');
	//管理员模块资源控制器
	Route::resource('manager','Admin\ManagerController');
	//后台退出操作
	Route::get('logout','Admin\LogController@logout');
	
	//社团模块资源控制器
	Route::resource('associate','Admin\AssociateController');
	
	Route::resource('assocInfo','Admin\AssocInfoController');
	Route::post('assocInfoUpload','Admin\AssocInfoController@upload');
	
	//院系
	Route::resource('poly','Admin\PolyController');
	
	//社团账号
	Route::resource('assocaccount','Admin\AssocAccountController');
	
	//活动
	Route::resource('activity','Admin\ActivityController');
	
	//后台评论
	Route::resource('comment','Admin\CommentController');
	Route::get('listcomment','Admin\CommentController@listcomment');
});
	
	//验证码
	Route::get('verify','VerifyController@index');

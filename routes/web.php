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

//后台
Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){
        //登陆页面
    Route::match(['post','get'],'login','IndexController@login');
        //退出登录
    Route::get('logout','IndexController@logout');
        //后台页面
    Route::any('index','IndexController@index');
        //后台欢迎页面
    Route::any('welcome','IndexController@welcome');
        //权限管理
    Route::resource('role','RoleController');
        //ajax 获取角色列表
    Route::post('role/ajax_list','RoleController@ajax_list');
        //管理员管理(资源路由)
    Route::resource('admin','AdminController');
    //ajax 获取管理员列表
    Route::post('admin/ajax_list','AdminController@ajax_list');
});

//前台
Route::group(['namespace'=>'Home'],function(){
    //前台首页
    Route::any('/','IndexController@index');
});
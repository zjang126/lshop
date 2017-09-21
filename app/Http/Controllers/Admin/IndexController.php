<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //首页
    public function index()
    {
        return view('admin.index.index');
    }
    //后台欢迎页面
    public function welcome()
    {
        return view('admin.index.welcome');
    }
    //登陆
    public function login()
    {
        return view('admin.index.login');
    }
    //退出登录
    public function logout()
    {

    }
}

@extends('admin.common')
@section('titile')在线教育系统-后台管理系统欢迎页面@endsection
@section('content')
<div class="page-container">
    <p class="f-20 text-success">欢迎使用H-ui.admin <span class="f-14">v2.4</span>后台模版！</p>
    <p>登录次数：18 </p>
    <p>上次登录IP：222.35.131.79.1  上次登录时间：2014-6-14 11:19:55</p>
    <table class="table table-border table-bordered table-bg">
        <thead>
        <tr>
            <th colspan="7" scope="col">信息统计</th>
        </tr>
        <tr class="text-c">
            <th>统计</th>
            <th>资讯库</th>
            <th>图片库</th>
            <th>产品库</th>
            <th>用户</th>
            <th>管理员</th>
        </tr>
        </thead>
        <tbody>
        <tr class="text-c">
            <td>总数</td>
            <td>92</td>
            <td>9</td>
            <td>0</td>
            <td>8</td>
            <td>20</td>
        </tr>
        <tr class="text-c">
            <td>今日</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
        </tr>
        <tr class="text-c">
            <td>昨日</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
        </tr>
        <tr class="text-c">
            <td>本周</td>
            <td>2</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
        </tr>
        <tr class="text-c">
            <td>本月</td>
            <td>2</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
        </tr>
        </tbody>
    </table>
    <table class="table table-border table-bordered table-bg mt-20">
        <thead>
        <tr>
            <th colspan="2" scope="col">服务器信息</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th width="30%">服务器计算机名 '*'</th>
            <td><span id="lbServerName">{{  gethostbyaddr($_SERVER['REMOTE_ADDR']) }}</span></td>
        </tr>
        <tr>
            <td>服务器IP地址 '*'</td>
            <td>{{ $_SERVER['SERVER_ADDR']}}</td>
        </tr>
        <tr>
            <td>服务器域名 '*'</td>
            <td>{{ $_SERVER['SERVER_NAME'] }}</td>
        </tr>
        <tr>
            <td>服务器端口 '*' </td>
            <td>{{ $_SERVER["SERVER_PORT"] }}</td>
        </tr>
        <tr>
            <td>服务器IIS版本 '*' </td>
            <td>{{  $_SERVER ['SERVER_SOFTWARE'] }}</td>
        </tr>
        <tr>
            <td>本文件所在文件夹 '*'</td>
            <td>{{   dirname(__FILE__) }}</td>
        </tr>
        <tr>
            <td>服务器操作系统 '*' </td>
            <td>{{ php_uname() }}</td>
        </tr>
        <tr>
            <td>系统所在文件夹  </td>
            <td>{{$_SERVER['SystemRoot'] }}</td>
        </tr>
        <tr>
            <td>服务器脚本超时时间 '*' </td>
            <td>{{ ini_get('max_execution_time') }}</td>
        </tr>
        <tr>
            <td>服务器的语言种类 '*' </td>
            <td>{{ config('app.locale')}}</td>
        </tr>
        <tr>
            <td>服务器当前时间 '*' </td>
            <td>{{ date('Y-m-d H:i:s')}}</td>
        </tr>
        <tr>
            <td>服务器IE版本 '*' </td>
            <td>{{ $_SERVER['HTTP_USER_AGENT'] }}</td>
        </tr>
        <tr>
            <td>服务器上次启动到现在已运行 '*' </td>
            <td> {{ explode(",",exec('uptime'))[0] }}</td>
        </tr>
        <tr>
            <td>当前程序占用内存 '*' </td>
            <td>{{ get_cfg_var ("memory_limit")?get_cfg_var("memory_limit"):"无" }}</td>
        </tr>
        <tr>
            <td>当前Session数量 </td>
            <td> </td>
        </tr>
        <tr>
            <td>当前SessionID </td>
            <td></td>
        </tr>
        <tr>
            <td>当前系统用户名 '*' </td>
            <td>{{ Get_Current_User() }}</td>
        </tr>
        </tbody>
    </table>
</div>
<footer class="footer mt-20">
    <div class="container">
        <p>感谢jQuery、layer、laypage、Validform、UEditor、My97DatePicker、iconfont、Datatables、WebUploaded、icheck、highcharts、bootstrap-Switch<br>
            Copyright &copy;2015 H-ui.admin v2.3 All Rights Reserved.<br>
            本后台系统由<a href="http://www.h-ui.net/" target="_blank" title="H-ui前端框架">H-ui前端框架</a>提供前端技术支持</p>
    </div>
</footer>
@endsection
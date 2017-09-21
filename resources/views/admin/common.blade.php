<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <LINK rel="Bookmark" href="/favicon.ico" >
    <LINK rel="Shortcut Icon" href="/favicon.ico" />
    <!--[if lt IE 9]>
    <script type="text/javascript" src="{{asset('back')}}/lib/html5.js"></script>
    <script type="text/javascript" src="{{asset('back')}}/lib/respond.min.js"></script>
    <script type="text/javascript" src="{{asset('back')}}/lib/PIE_IE678.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="{{asset('back')}}/static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="{{asset('back')}}/static/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="{{asset('back')}}/lib/Hui-iconfont/1.0.7/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="{{asset('back')}}/lib/icheck/icheck.css" />
    <link rel="stylesheet" type="text/css" href="{{asset('back')}}/static/h-ui.admin/skin/default/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="{{asset('back')}}/static/h-ui.admin/css/style.css" />
    <!--[if IE 6]>
    <script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
    <title>@yield('title')</title>
</head>
<body>
@yield('content')
<script type="text/javascript" src="{{asset('back')}}/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="{{asset('back')}}/lib/layer/2.1/layer.js"></script>
<script type="text/javascript" src="{{asset('back')}}/lib/jquery.contextmenu/jquery.contextmenu.r2.js"></script>
<script type="text/javascript" src="{{asset('back')}}/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="{{asset('back')}}/static/h-ui.admin/js/H-ui.admin.js"></script>
@yield('footer-script')
</body>
</html>
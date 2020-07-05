<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title','记账系统')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- 新 Bootstrap 核心 CSS 文件 -->
    <link href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>

    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style>
        .storefrom{margin:10px;}
    </style>

</head>
<body>

<nav class="navbar navbar-default " role="navigation" style="margin-bottom:10px;">
    <div class="container-fluid ">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#example-navbar-collapse">
                <span class="sr-only">切换导航</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">记账系统</a>
        </div>
        <div class="collapse navbar-collapse" id="example-navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"> <a >统计查看</a></li>
                <li><a >分类管理</a></li>
                <li><a >商品管理</a></li>
                <li><a >记录管理</a></li>
                <li><a href="{{url('users/list')}}">用户管理</a></li>
                <li><a >分类管理</a></li>
                <li class="bg-danger"> <a href="{{url('logout')}}">退出登陆</a></li>
            </ul>
        </div>
    </div>
</nav>



        <!--操作按键-->
        @section('editsub')
            @show

        <!--中间内容-->
        @section('contents')
        @show

        <!--下部内容-->
        @section('footer')
        @show

    </div>
</body>
</html>

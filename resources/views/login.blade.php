<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- 可选的 Bootstrap 主题文件（一般不用引入） -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="container-fluid">

        <h2 class="text-center">登录页面</h2>




        <div class="row " style="padding:5px;">

                @if (isset($errors) && count($errors)>0)
                <!-- Form Error List -->
                    <div class="alert alert-danger">
                        <strong>错误提示</strong>

                        <br><br>

                        <ul>
                                @foreach ($errors->all() as $k => $error)
                                    <li> {{ $error }}</li>
                                @endforeach
                        </ul>
                    </div>
                @endif

                @if (isset($msg) && !empty($msg))
                        <div class="alert alert-danger">
                            <strong>错误提示</strong>

                            <br><br>
                            <ul>
                                <li> {{ $msg }}</li>
                            </ul>
                        </div>
                @endif


                <form method="post" action="{{url('sublogin')}}">
                    <div class="form-group">
                        <label for="exampleInputEmail1" >用户名</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="用户名">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">密码</label>
                        <input type="password" name="passwd" class="form-control" id="exampleInputPassword1" placeholder="密码">
                    </div>

                    <button type="submit" class="btn btn-success">提交</button>
                    <button type="reset" class="btn btn-default">重置</button>
                </form>


    </div>
</div>
</body>
</html>

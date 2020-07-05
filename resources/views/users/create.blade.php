@extends('layout.app')

@section('title')
       添加用户
@endsection

@section('editsub')
     <a class="btn btn-info" href="javascript:history.back(-1)" >返回</a>
@endsection


@section('contents')
<div class="container">
       @include('users.error')
       <form class="storefrom" method="post" action="{{url('users/post')}}">
              <div class="form-group">
                     <label for="user_name">用户名</label>
                     <input type="text" class="form-control" name="user_name" id="user_name" placeholder="用户名">
              </div>
              <div class="form-group">
                     <label for="user_mobile">手机号</label>
                     <input type="text" class="form-control" name="user_mobile" id="user_mobile" placeholder="手机号">
              </div>
              <div class="form-group">
                     <label for="password">密码</label>
                     <input type="password" class="form-control" name="password" id="password" placeholder="密码">
              </div>
              <div class="form-group">
                     <label for="password_confirmation">验证密码</label>
                     <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="确认密码">
              </div>

              <div class="row">
                     <div class="col-xs-3"></div>
                     <div class="col-xs-6 text-center">
                            <input class="btn btn-success" type="submit" value="提交">
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <input class="btn btn-danger" type="submit" value="重置">
                      <div>
                     <div class="col-xs-3"></div>
              </div>
       </form>
</div>
@endsection

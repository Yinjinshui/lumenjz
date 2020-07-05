@extends('layout.app')

@section('title')
       用户管理
@endsection

@section('editsub')
       @include('users.submit')
@endsection

@section('contents')
       <div class="table-responsive" style="margin-top:10px;">
              <table class="table">
                     <tr>
                            <th class="active"><input type="checkbox" name="useridall" ></th>
                            <th class="success">编号</th>
                            <th class="warning">用户名</th>
                            <th class="danger">创建时间</th>
                            <th class="info">操作</th>
                     </tr>


                     @foreach ($users as $user)
                     <tr>
                            <td><input type="checkbox" name="user_id" value=" {{ $user->user_id }}"></td>
                            <td>{{ $user->user_id }} </td>
                            <td>{{ $user->user_name}} </td>
                            <td>{{ $user->create_time}} </td>
                            <td>
                                   <a href="">更新</a>
                            </td>
                     </tr>
                     @endforeach
              </table>
       </div>


       <div class="row">
              <div class="col-xs-2">&nbsp;</div>
              <div class="col-xs-8 text-center"> {{ $users->links() }}</div>
              <div class="col-xs-2">&nbsp;</div>
       </div>

@endsection

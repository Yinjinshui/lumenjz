<?php

namespace App\Http\Controllers;


use App\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;


class UsersController extends Controller
{
    /**
     * 获取列表数据
     * @author Json
     */
    public function userIndex(){
        $list=Users::paginate(1);
        return view('users.list')->with('users',$list);
    }

    public function create(){
        return view('users.create');
    }
    /**
     * 添加数据
     * @author Json
     */
    public function store(Request $request){
        //定义验证规则，是一个数组
        $rules = [
            'user_name' => 'required|unique:ka_users|max:30',
            'user_mobile' => 'required|unique:ka_users|size:11|numeric',
            'password' =>'required',
            'password_confirmation'=>'required|same:password'//不为空,两次密码是否相同

        ];

        //定义提示信息
        $messages = [
            'user_name.required' => '用户不能为空',
            'user_name.unique'=>'该用户名已经存在',
            'user_mobile.required' => '密码不能为空',
            'user_mobile.size'=>'手机号必须11位',
            'user_mobile.numeric'=>'请输入正确的手机号',
            'user_mobile.unique' => '改手机号已经存在',
            'password.required'=>'密码不能为空',
            'password_confirmation.required'=>"确认密码不能为空",
            'password_confirmation.same'=>'密码与确认密码不匹配'
        ];

        //返回json的错误
        //方式1
        //$this->validate($request, $rules,$messages);

        //创建验证器
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return view('users.create')->with('errors',$validator->errors());
        }


    }



    /**
     * 欢迎页
     * @author Json
     */
    public function wellCome(){
        //app('session')->put('userInfo',Null);
       return view('Index.wellcome');
    }

    /**
     * 登录页面
     * @author Json
     */
    public function login(Request $request){
        // 写入一条数据至 session 中...
        //app('session')->put('userInfo','value');

        // 获取session中键值未key的数据
        $result = app('session')->get('userInfo');
        if (!empty($result)) {
            return redirect()->route('wellcome');
        }
        return view('login');
    }


    /**
     * 登录验证
     * @author Json
     */
    public function sublogin(Request $request){
        //定义验证规则，是一个数组
        $rules = [
            'name' => 'required|max:64',
            'passwd' => 'required|max:500'
        ];

        //定义提示信息
        $messages = [
            'name.required' => '用户不能为空',
            'passwd.required' => '密码不能为空'
        ];
        //创建验证器
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            //print_r($validator->errors()->all());exit();
           // return redirect('login')->withErrors($validator)->withInput();
            return view('login')->with('errors',$validator->errors());
        }

        //输入框数据验证通过
        $field=['user_id','user_name','user_mobile','password'];
        $userRes=Users::where('user_name',$request->post('name'))->select($field)->first();
        if(empty($userRes)){
            return view('login')->with('msg','用户名不正确');
        }

        //获取的密码进行加密
        //$inputPasswd=encrypt($request->post('passwd'));
        if(decrypt($userRes->password)!=$request->post('passwd')){
            //密码错误
            return view('login')->with('msg','密码错误');
        }


        //添加session
        app('session')->put('userInfo',$userRes->toArray());
        return redirect()->route('wellcome');
    }

    /**
     * 退出
     */
    public function logout(){
        app('session')->put('userInfo',Null);
        return redirect('login');
    }
}

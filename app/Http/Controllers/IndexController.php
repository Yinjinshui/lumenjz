<?php

namespace App\Http\Controllers;


use App\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use phpDocumentor\Reflection\Types\Null_;


class IndexController extends Controller
{
    /**
     * 欢迎页
     * @author Json
     */
    public function wellCome(){
        //app('session')->put('userInfo',Null);
       return view('index.wellcome');
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

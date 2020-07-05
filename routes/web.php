<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

/*$router->get('/', function () use ($router) {
    return $router->app->version();
});*/


//首页 (判断是否登录)
$router->group(['middleware' => 'denglv'], function () use ($router) {
    //首页
    $router->get('/', ['as'=>'wellcome','uses'=>"IndexController@wellCome"]);
});


//跳转登录页面
$router->get('login',[
    'as' => 'login', 'uses' => 'IndexController@login'
]);

//登录验证
$router->post('sublogin',[
    'as' => 'sublogin', 'uses' => 'IndexController@sublogin'
]);

//退出登陆
$router->get('logout','IndexController@logout');



//用户管理
$router->group(['middleware' => 'denglv','prefix'=>'users'], function () use ($router) {
    //列表
    $router->get('list', ['as'=>'list','uses'=>"UsersController@userIndex"]);

    //添加
    $router->get('create', ['as'=>'create','uses'=>"UsersController@create"]);
    $router->post('post', ['as'=>'post','uses'=>"UsersController@store"]);


});

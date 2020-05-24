<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\facade\Route;

/**
 * 需要检测是否已经授权的分组
 */
Route::group(':v',function (){
    // get请求方式
    Route::get('',':v.Index/index');
});
/**
 * 需要检测是否已经授权的分组
 */
Route::group(':v',function (){
    // post请求方式
    Route::post('/testpost',':v.Index/test');
    // 资源路由方式
    Route::resource('/user',':v.User');
})->middleware(['checkAuth']);


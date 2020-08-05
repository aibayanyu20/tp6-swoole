<?php
/**
 * @time 11:26 2020/7/30
 * @author loster
 */
use think\facade\Route;

/**
 * 已知不需要授权的路由
 */
Route::group(":v",function (){
    // 登录界面
    Route::get('/login',':v.Login/login');
});


/**
 * 已知需要授权的路由
 */
Route::group(":v",function (){
    //
})->middleware(['checkAuth']);

/**
 * 未配置的路由全部走这个
 */
Route::any(':v/:controller/:action',":v.:controller/:action")->middleware(['checkAuth']);
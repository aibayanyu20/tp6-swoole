<?php
/**
 * @time 11:26 2020/7/30
 * @author loster
 */
use think\facade\Route;

/**
 * 所有路由走全部都走这个
 */
Route::any(':v/:controller/:action',":v.:controller/:action")->middleware(['checkAuth']);
<?php
/**
 * @time 11:26 2020/7/30
 * @author loster
 */
use think\facade\Route;

Route::any(':v/:controller/:method',":v.:controller/:method")->middleware(['checkAuth']);
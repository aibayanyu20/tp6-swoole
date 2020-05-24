<?php


namespace app\common\lib\wechatApi;

use app\common\lib\wechatApi\src\Common;
use app\common\lib\wechatApi\src\Login;

class BaseWechatApi
{

    public $base = null;

    public function __construct()
    {
        $this->base = "测试";
    }

    public function login(Login $login){
        $this->base = "login";
        return $login;
    }

    public function common(Common $common){
        $this->base = "common";
        return $common;
    }

}
<?php
namespace app;

// 应用请求对象类
class Request extends \think\Request
{
    // 用户id
    public $userId = false;

    // 获取真实的ip地址
    public function getIp() : string
    {
        $ip = $this->ip();
        if($ip == '127.0.0.1'){
            return $this->server("HTTP_X_REAL_IP","0.0.0.0");
        }
        return $ip;
    }

    // 获取用户的规则
    public function getUserRole(){
        if ($this->userId){
            // 拿到当前的用户的id
            return $this->userId;
        }
    }
}

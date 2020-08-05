<?php
namespace app;

// 应用请求对象类
class Request extends \think\Request
{
    public function getIp():string{
        return $this->server("HTTP_X_REAL_IP","0.0.0.0");
    }
}

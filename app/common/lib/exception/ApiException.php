<?php


namespace app\common\lib\exception;


use Throwable;

class ApiException extends \Exception
{
    // 抛出的错误信息
    private $msg;

    // 抛出错误代码
    private $errorCode;

    // 构造方法
    public function __construct($msg="服务器错误",$errorCode=400)
    {
        $this->msg = $msg;
        $this->errorCode = $errorCode;
    }

    public function getErrorCode(){
        return $this->errorCode;
    }

    public function getMsg(){
        return $this->msg;
    }
}
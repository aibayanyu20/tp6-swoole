<?php
/**
 * @time 10:15 2020/7/30
 * @author loster
 */

namespace app\common\exception;

class ApiException extends \Exception
{
    protected $errorCode = 9999;

    protected $msg = "服务器出错，请重试";

    public function __construct($code = 9999,$msg = "")
    {
        $apiConfig = config("apiException");
        if (isset($apiConfig[$code])) {
            $this->msg = $apiConfig[$code];
        }
        if (!empty($msg)) $this->msg = $msg;
        $this->errorCode = $code;
    }

    /**
     * @return mixed
     */
    public function getErrorCode()
    {
        return $this->errorCode;
    }

    /**
     * @return mixed
     */
    public function getMsg()
    {
        return $this->msg;
    }
}
<?php


namespace app\common\validate;


use app\common\lib\exception\ApiException;
use think\Validate;

class BaseValidate extends Validate
{
    /** 验证器基类
     * @param string $scene
     * @throws ApiException|ApiException
     */
    public function goCheck($scene=""){
        $params = $this->request->param();
        if ($scene){
            $res = $this->scene($scene)->check($params);
        }else{
            $res = $this->check($params);
        }
        if (!$res) apiError($this->getError(),400);
    }
}
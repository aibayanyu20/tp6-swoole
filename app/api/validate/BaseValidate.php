<?php
/**
 * @time 16:34 2020/8/4
 * @author loster
 */

namespace app\api\validate;


use app\common\exception\ApiException;
use think\Validate;

class BaseValidate extends Validate
{
    /**
     * 自定义验证器
     * @time 16:36 2020/8/4
     * @param string $scene 场景验证
     * @return bool
     * @throws ApiException
     * @author loster
     */
    public function goCheck($scene = ""){
        // 场景验证
        $params = $this->request->param();
        if (empty($params)) apiError(20001);
        if (!empty($scene)){
            // 存在的数据
            $valid = $this->check($params);
        }else{
            // 不存在数据
            $valid = $this->scene($scene)->check($params);
        }
        // 数据验证器
        if (!$valid) apiError(0,$this->getError());
        // 验证通过
        return true;
    }
}
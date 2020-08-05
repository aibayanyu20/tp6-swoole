<?php
/**
 * @time 16:30 2020/8/4
 * @author loster
 */

namespace app\api\controller\v1;


use app\common\BaseController;

/**
 * 用户控制器
 * @time 16:30 2020/8/4
 * @author loster
 * Class User
 * @package app\api\controller\v1
 */
class User extends BaseController
{
    // 获取用户的基本信息
    public function getUserInfo(){
        halt($this->request->getUserRole());
    }
}
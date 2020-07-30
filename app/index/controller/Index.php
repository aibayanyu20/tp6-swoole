<?php
/**
 * @time 10:12 2020/7/30
 * @author loster
 */

namespace app\index\controller;


use app\common\BaseController;

class Index extends BaseController
{
    public function index(){
        $this->manager->getServer()->task([
            'data'=>'你好'
        ]);
    }
}
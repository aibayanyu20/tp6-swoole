<?php
/**
 * @time 10:12 2020/7/30
 * @author loster
 */

namespace app\index\controller;


use app\common\BaseController;
use app\common\model\Users;

class Index extends BaseController
{
    public function index(){
//        $this->manager->getServer()->task([
//            'data'=>'你好'
//        ]);
        return "Sdsds";
    }

    public function create(){
        // 创建一个账号
        $arr = [
            'nickname'=>'管理员账号',
            'username'=>'admin',
            'password'=>password_hash("admin",PASSWORD_DEFAULT),
            'avatar'=>'https://ss0.bdstatic.com/70cFvHSh_Q1YnxGkpoWK1HF6hhy/it/u=1316698706,2708023180&fm=11&gp=0.jpg',
            'parent_id'=>0,
            'phone'=>'13788881234',
            'email'=>'aibayanyu@qq.com',
            'status'=>1
        ];
        (new Users())->save($arr);
    }
}
<?php


namespace app\index\controller;


use app\common\lib\curl\BaseCurl;
use app\common\lib\curl\MutilCurl;
use app\common\lib\jwt\JwtAuth;
use app\common\validate\UserValidate;
use think\facade\Queue;


class Index
{
    public function index(){
        return "index";
    }

    public function wechat(){
        dd("测试");
    }

    public function jwt(JwtAuth $auth){
        $token = $auth->createToken([
            'id'=>1,
            'nickname'=>'测试'
        ]);
        return apiSuccess('ok',$token,200,['token'=>$token]);
    }

    public function checkInfo(){
        // 验证不通过自动抛出json异常信息
        (new UserValidate())->goCheck('login');
        // 验证通过
        // TODO
    }

    public function echoJson(){
        return json(['code'=>1,'msg'=>'22']);
    }

    public function curl(){
        $curl = new BaseCurl("http://api.k780.com");
        halt($curl->setOther()->getUrl());
        $res = $curl->get("/?app=ip.get&ip=202.96.128.166&appkey=10003&sign=b59bc3ef6191eb9f747dd4e83c99f2a4&format=json");
        halt($res);
    }

    public function mutil(){
        $curl = new MutilCurl("http://api.k780.com");
        $curl->complete(function ($res){
            dump($res->response);
        });
        $curl->error(function ($res){
            dump($res);
        });
        $curl->success(function ($res){
            dump($res);
        });
        $curl->addGet("/?app=ip.get&ip=202.96.128.166&appkey=10003&sign=b59bc3ef6191eb9f747dd4e83c99f2a4&format=json");
        $curl->addGet("/?app=ip.get&ip=202.96.128.166&appkey=10003&sign=b59bc3ef6191eb9f747dd4e83c99f2a4&format=json");
        $curl->exec();
    }


    public function queue(){
        $id = request()->param('id');
        Queue::push('app\common\queue\QueueEmail@sendMAIL',['file'=>"email{$id}.txt",'content'=>"sssssss{$id}"],"sendEmail");
    }
}
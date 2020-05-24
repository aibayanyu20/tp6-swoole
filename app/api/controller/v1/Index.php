<?php


namespace app\api\controller\v1;


class Index
{
    public function index(){
        return apiSuccess('api v1版本接口',"data");
    }
}
<?php
/**
 * @time 10:12 2020/7/30
 * @author loster
 */

namespace app\index\controller;


use app\common\BaseController;
use think\helper\Str;

class Index extends BaseController
{
    public function index(){
        return md5(Str::random(32));
    }
}
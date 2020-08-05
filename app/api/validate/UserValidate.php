<?php
/**
 * @time 16:33 2020/8/4
 * @author loster
 */

namespace app\api\validate;


class UserValidate extends BaseValidate
{
    protected $rule = [
        'username|账号' => 'require|alphaDash|length:5,20',
        'password|密码' => 'require|min:5'
    ];

    protected $message = [
        'password.min' => '密码不能低于5位',
        'username.length' => '账号只能在5到20位内',
        'username.alphaDash' => '账号只能为字母、数字、下划线、破折号'
    ];

    protected $scene = [
        'login' => ['password', 'username']
    ];
}
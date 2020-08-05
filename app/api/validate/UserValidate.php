<?php
/**
 * @time 16:33 2020/8/4
 * @author loster
 */

namespace app\api\validate;


class UserValidate extends BaseValidate
{
    protected $rule = [
        'password|密码' => 'require|min:5',
        'username|账号' => 'require|length:5,20'
    ];

    protected $message = [
        'password.min' => '密码不能低于5位',
        'username.length' => '账号只能在5到20位内'
    ];

    protected $scene = [
        'login' => ['password', 'username']
    ];
}
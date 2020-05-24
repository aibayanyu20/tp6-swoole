<?php


namespace app\common\validate;


class UserValidate extends BaseValidate
{
    /**
     * 验证规则
     * @var array
     */
    protected $rule = [
        'username|用户名称'=>'require|checkName',
        'password|用户密码'=>'require',
        'mobile|手机号'=>'require|mobile'
    ];
    /**
     * 验证回复自定消息
     * @var array
     */
    protected $message = [
        'mobile.mobile'=>'手机号格式不正确'
    ];

    /**
     * 验证场景
     * @var array
     */
    protected $scene = [
        'login'=>['username','password']
    ];


    /**
     * 验证自定义规则
     * @param mixed $value 拿到的数据
     * @param mixed $rule 验证规则
     * @param array $data 全部数据（数组）
     * @return bool|string
     */

    protected function checkName($value, $rule, $data=[])
    {
        return $rule === $value ? true : '名称错误';
    }
}
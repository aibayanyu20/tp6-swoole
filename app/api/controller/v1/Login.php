<?php
/**
 * @time 17:05 2020/8/4
 * @author loster
 */

namespace app\api\controller\v1;


use app\api\validate\UserValidate;
use app\common\BaseController;
use app\common\jwt\JwtAuth;
use app\common\model\Users;

class Login extends BaseController
{
    public function login(UserValidate $userValidate,Users $users){
        halt($this->request->getIp());
        // 登录账号
        $userValidate->goCheck('login');
        // 验证通过，判断当前的账号密码是否正确
        $username = $this->request->param("username");
        $password = $this->request->param("password");
        $user = $users->where("username",$username)
            ->withoutField("delete_time,update_time")
            ->find();
        if (!$user) apiError(0,"账号不存在");
        if (!password_verify($password,$user->password)) apiError(0,'密码不正确');
        // 验证通过,登录成功，生成一个token
        $payload = $user->toArray();
        unset($payload['password']);
        $token = (new JwtAuth())->createToken($payload);
        $users->where("id",$payload['id'])->save(['last_login_ip'=>$this->request->getIp(),'last_login_time'=>date('Y-m-d H:i:s')]);
        return apiSuccess("登录成功",['token'=>$token]);
    }
}
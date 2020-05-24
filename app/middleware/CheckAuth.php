<?php
declare (strict_types = 1);

namespace app\middleware;

use app\common\lib\exception\ApiException;
use app\common\lib\jwt\JwtAuth;
use think\facade\Cache;

class CheckAuth
{
    /**
     * 处理请求
     *
     * @param \think\Request $request
     * @param \Closure $next
     * @param JwtAuth $auth
     * @return void
     * @throws ApiException
     */
    public function handle($request, \Closure $next,JwtAuth $auth)
    {
        // 获取token信息
        $token = $request->header('token');
        if (empty($token)) apiError("token不存在");
        // 验证当前的token是否已经过期(在开启自动刷新的时候保证token的唯一性)
        if (!Cache::has($token)) apiError('token已过期');
        // 使用jwt验证token
        $auth->checkToken($token);
        // 获取配置文件是否需要自动刷新token
        $refresh = empty(config('jwt.refreshAuto'))?false:config('jwt.refreshAuto');
        if ($refresh){
            $data = Cache::pull($token);
            $token = $auth->createToken($data);
            $request->refreshToken = $token;
        }
        $data = Cache::get($token);
        $request->authToken = $token;
        $request->authData = $data;
        return $next($request);
    }
}

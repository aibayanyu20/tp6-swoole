<?php
declare (strict_types = 1);

namespace app\common\jwt\middleware;

use app\common\exception\ApiException;
use app\common\jwt\JwtAuth;
use Closure;
use think\Request;

class CheckJwtAuth
{
    /**
     * 处理请求
     *
     * @param Request $request
     * @param Closure $next
     * @return Response
     * @throws ApiException
     */
    public function handle($request, Closure $next)
    {
        // 获取一下当前的token是否存在
        $token = $request->header("Access-Token");
        if (empty($token)) apiError(10000);
        // 验证token是否可以正常使用
        $auth = new JwtAuth();
        $data = $auth->checkToken($token);
        $request->userId = $data['id'];
        return $next($request);
    }
}

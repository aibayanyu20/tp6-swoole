<?php
// 应用公共文件
// 成功请求返回的信息
use app\common\lib\exception\ApiException;

function apiSuccess($msg="ok", $data="", $code=200,$header=[]){
    // 判断请求头中是否存在新的token
    $refreshToken = isset(request()->refreshToken)?request()->refreshToken:false;
    $arr = [
        'msg'=>$msg,
        'code'=>$code
    ];
    if (is_array($data)){
        $arr['list'] = $data;
    }else{
        $arr['data'] = $data;
    }
    // 判断当前是否存在要刷新的token
    if ($refreshToken){
        $headers = array_merge($header,['token'=>$refreshToken]);
    }else{
        $headers = $header;
    }
    return  json($arr,$code)->header($headers);
}

// 失败请求返回的信息
function apiError($msg="fail",$code=400){
    throw new ApiException($msg,$code);
}

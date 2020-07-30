<?php
// 应用公共文件
function apiSuccess($msg,$data=[],$token=false){
    // 判读当前的数据是否存在存在返回已经存在的数据
    $arr = [];
    $arr['msg'] = $msg;
    $arr['code'] = 1;
    // 判断当前是否存在数据信息
    if (!empty($data)) $arr['data'] = $data;
    // 判断当前返回的格式信息
    if (empty($token)) return  json($arr);
    // 判断当前的数据信息
    return json($arr)->header(['Access-Token'=>$token]);
}

function apiError($code = 0,$msg=""){
    throw new \app\common\exception\ApiException($code,$msg);
}
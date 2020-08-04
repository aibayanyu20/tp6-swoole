<?php
/**
 * @time 16:23 2020/8/4
 * @author loster
 */

namespace app\common\model;


use think\Model;

class BaseModel extends Model
{
    protected $autoWriteTimestamp = true;
    protected $createTime = "create_time";
    protected $updateTime = "update_time";
}
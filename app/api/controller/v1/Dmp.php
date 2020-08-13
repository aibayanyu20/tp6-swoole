<?php
/**
 * @time 10:59 2020/8/12
 * @author loster
 */

namespace app\api\controller\v1;


use app\api\model\Label;
use app\api\model\OriginalData;
use app\common\BaseController;

class Dmp extends BaseController
{
    public function getLabels(Label $label,OriginalData $originalData){
        $labels = $label->where("labelfrom","沃享")
            ->withoutField("province")
            ->where("industry_name","教育服务")
            ->limit(10)
            ->select()->toArray();
        foreach ($labels as &$i){
            $i['nums'] = $originalData->where("label_id",$i['label_id'])->count();
        }
        return apiSuccess("ok",$labels);
    }
}
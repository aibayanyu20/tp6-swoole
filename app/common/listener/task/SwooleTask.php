<?php
/**
 * @time 17:38 2020/7/30
 * @author loster
 */

namespace app\common\listener\task;


class SwooleTask
{
    /**
     * 事件监听处理
     *
     * @return mixed
     */
    public function handle($event)
    {
       // 事件分发判断当前的事件属于哪一类分发至对应的事件机制中
        if (isset($event['action'])&&isset($event['data'])) {
            $data = $event['data'];
            switch ($event['action']) {
                case "sms":
                    event(SendSms::class, $data);
                    dump("分发至短信");
                    break;
                case "email":
                    event(SendEmail::class, $data);
                    dump("分发至邮件");
                    break;
                default:
                    dump("未知的任务");
            }
        }else{
            dump($event);
        }
    }
}
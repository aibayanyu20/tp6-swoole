<?php
declare (strict_types = 1);

namespace app\common\listener\socket;

class SocketMessage
{
    /**
     * 事件监听处理
     *
     * @return mixed
     */
    public function handle($event)
    {
        //
        $ws = app('\think\swoole\Websocket');
        dump($event);
    }    
}

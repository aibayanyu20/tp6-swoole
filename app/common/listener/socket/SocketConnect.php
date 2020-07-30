<?php
declare (strict_types = 1);

namespace app\common\listener\socket;

class SocketConnect
{
    /**
     * 事件监听处理
     *
     * @return mixed
     */
    public function handle($event)
    {
        //实例化 Websocket 类
        $ws = app('\think\swoole\Websocket');
        $ws->emit('connect',$ws->getSender());
    }    
}

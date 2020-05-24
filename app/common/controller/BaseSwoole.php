<?php


namespace app\common\controller;


use Swoole\Server;
use think\swoole\Websocket;
use think\swoole\websocket\Room;

class BaseSwoole
{
    /**
     * ws方法
     */
    protected $ws;
    /**
     * 注册服务对象
     */
    protected $server;

    /**
     * 注册websocketRoom对象
     */
    protected $room;

    /**
     * @param Websocket $ws
     * @param Server $server
     * @param Room $room
     */
    protected function __construct(Websocket $ws,Server $server,Room $room)
    {
        $this->ws = $ws;
        $this->server = $server;
        $this->room = $room;
    }
}
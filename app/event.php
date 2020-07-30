<?php
// 事件定义文件
use app\common\listener\SocketClose;
use app\common\listener\SocketConnect;
use app\common\listener\SocketMessage;

return [
    'bind'      => [
    ],

    'listen'    => [
        'AppInit'  => [],
        'HttpRun'  => [],
        'HttpEnd'  => [],
        'LogLevel' => [],
        'LogWrite' => [],
        'swoole.websocket.Connect'=>[
            SocketConnect::class
        ],
        'swoole.websocket.Close'=>[
            SocketClose::class
        ],
        'swoole.websocket.Message'=>[
            SocketMessage::class
        ]
    ],

    'subscribe' => [
    ],
];

<?php
return [
    'expire'=>7200,
    'secret' => '9pgyDboySoemlOkws093sEXDV72OzxGj',
    'iss'=>'',//签发者，可以为空
    'aud'=>'',//面向的用户，可以空
    'delay'=>0,//签发token延迟生效时间单位s
    'refreshAuto'=>false //是否需要自动刷新token
];
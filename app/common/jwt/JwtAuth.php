<?php
declare (strict_types = 1);

namespace app\common\jwt;

use Firebase\JWT\BeforeValidException;
use Firebase\JWT\ExpiredException;
use Firebase\JWT\JWT;
use Firebase\JWT\SignatureInvalidException;

class JwtAuth
{
    // 密钥
    private $secret = "helloWord";

    // 延迟生效时间
    private  $delay = 0;

    // 签发者
    private $iss = "";

    // 面向用户
    private $aud = "";

    // 过期时间
    private $expire = 7200;

    public function __construct()
    {
        // 获取当前的配置项
        $config = config('jwt');
        if (array_key_exists('expire',$config)) $this->expire = $config['expire'];
        if (array_key_exists('secret',$config)) $this->secret = $config['secret'];
        if (array_key_exists('iss',$config)) $this->iss = $config['iss'];
        if (array_key_exists('aud',$config)) $this->aud = $config['aud'];
        if (array_key_exists('delay',$config)) $this->delay = $config['delay'];
    }

    // 创建一个token
    public function createToken($payload=[]){
        $data = [
            'iss'=>$this->iss, // 签发者
            'aud'=>$this->aud,
            'iat'=>time(), // 签发时间
            'nbf'=>time()+$this->delay, // 生效时间
            'exp'=>time()+$this->expire, // token过期时间
            'data'=>$payload // 需要储存的用户信息
        ];
        // 创建加密token
        return JWT::encode($data,$this->secret,"HS256");
    }

    // 检查token是否已经过期
    public function checkToken($token){
        try {
            $data = JWT::decode($token,$this->secret,array('HS256'));
            if (isset($data->data)){
                return (array)$data->data;
            }
            return [];
        }catch (SignatureInvalidException $e){
            apiError(10000,"签名不正确");
        }catch (BeforeValidException $e){
            // 签名还未生效
            apiError(10000,'token无效');
        }catch (ExpiredException $e){
            // 过期
            apiError(10000,"token已过期");
        }catch (\Exception $e){
            // 未知错误
            apiError(10001,"服务器出错");
        }
    }
}

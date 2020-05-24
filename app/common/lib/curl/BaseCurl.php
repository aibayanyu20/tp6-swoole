<?php


namespace app\common\lib\curl;


use Curl\Curl;

class BaseCurl
{
    // 获取当前的$curl;
    private $curl;

    // 定义公共的url
    private $url;

    // 初始化数据
    public function __construct($url="")
    {
        $this->url = $url;
        $this->curl = new Curl();
    }

    /**
     * 当前是否为https请求
     * @return $this
     */

    public function setHttps() {
        $this->curl->setOpt(CURLOPT_FOLLOWLOCATION,true);
        return $this;
    }

    /**
     * 添加请求头
     * @param array $headers
     * @return BaseCurl
     */
    public function setHeaders($headers=[]){
        // 判断是否包含headers
        if (count($headers)>0 && is_array($headers)) $this->curl->setHeaders($headers);
        return $this;
    }

    /**
     * 设置cookie
     * @param $key
     * @param $value
     * @return BaseCurl
     */
    public function setCookie($key,$value){
        $this->curl->setCookie($key,$value);
        return $this;
    }

    /*s*
     * 访问需要授权的页面
     * @param $username
     * @param $password
     * @return BaseCurl
     */
    public function setBasicAuthentication($username,$password){
        $this->curl->setBasicAuthentication($username,$password);
        return $this;
    }

    public function get($url,$data=[]){
        return $this->curl->get($this->url.$url,$data);
    }

    public function getOther($url,$data=[]){
        return $this->curl->get($url,$data);
    }

    public function post($url,$data=[]){
        return $this->curl->post($this->url.$url,$data);
    }

    public function postOther($url,$data=[]){
        return $this->curl->post($url,$data);
    }

    public function setProxy($proxy,$port=80,$username="",$password=""){
        $this->curl->setProxy($proxy,$port,$username,$password);
        return $this;
    }

    public function unsetHeaders($key){
        $this->curl->unsetHeader($key);
        return $this;
    }

    public function unsetProxy(){
        $this->curl->unsetProxy();
        return $this;
    }

    public function close(){
        $this->curl->close();
    }
    public function setOther(){
        return $this->curl;
    }
}
<?php


namespace app\common\lib\curl;


use Curl\MultiCurl;

class MutilCurl
{
    private $curl;

    private $url;

    public function __construct($url="")
    {
        $this->url = $url;
        $this->curl = new MultiCurl();
    }

    public function addPost($url,$data=[]){
        $this->curl->addPost($this->url.$url,$data);
        return $this;
    }

    public function addGet($url,$data=[]){
        $this->curl->addGet($this->url.$url,$data);
        return $this;
    }

    public function addOtherPost($url,$data =[]){
        $this->curl->addPost($url,$data);
        return $this;
    }

    public function addOtherGet($url,$data = []){
        $this->curl->addGet($url,$data);
        return $this;
    }

    public function exec(){
        $this->curl->start();
        return $this;
    }

    public function success($callback){
        $this->curl->success($callback);
    }

    public function complete($callback){
        $this->curl->complete($callback);
    }

    public function error($callback){
        $this->curl->error($callback);
    }

    public function close(){
        $this->curl->close();
    }

    public function setHeaders($headers){
        $this->curl->setHeaders($headers);
        return $this;
    }

    public function setHttps() {
        $this->curl->setOpt(CURLOPT_FOLLOWLOCATION,true);
        return $this;
    }

    public function setCookie($key,$value){
        $this->curl->setCookie($key,$value);
        return $this;
    }

    public function setBasicAuthentication($username,$password){
        $this->curl->setBasicAuthentication($username,$password);
        return $this;
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

    public function setOther(){
        return $this->curl;
    }
}
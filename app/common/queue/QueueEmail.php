<?php


namespace app\common\queue;


use think\queue\Job;

class QueueEmail
{
    public function sendMAIL(Job $job,$data){
        $isJobDone = $this->send($data);
        if ($isJobDone){
            $job->delete();
        }else{
            if ($job->attempts() >3){
                $job->delete();
            }
        }
    }

    public function send($data){
        try {
            file_put_contents($data['file'],$data['content']);
            return true;
        }catch (\Exception $e){
            return  false;
        }
    }
}
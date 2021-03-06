<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Log;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function webHook(Request $request){

        $target=base_path();
        $secret='123456';
        $wwwUser='www';
        $wwwGroup='www';
        $output=array();
        try{
            //获取GitHub发送的内容
            $json = file_get_contents('php://input');
            $content = json_decode($json, true);
            //github发送过来的签名
            $signature = $_SERVER['HTTP_X_HUB_SIGNATURE'];
            list($algo, $hash) = explode('=', $signature, 2);
            //计算签名
            $payloadHash = hash_hmac($algo, $json, $secret);
            if ($hash === $payloadHash) {
                //执行命令
                $cmd = "cd $target && git pull origin master";
                exec($cmd,$output);
                $res_log=$content['head_commit']['author']['name'] . ' 在' . date('Y-m-d H:i:s') . '向' . $content['repository']['name'] . '项目的' . $content['ref'] . '分支push了' . count($content['commits']) . '个commit：result:'.print_r($output);
                Log::channel('webhook')->info($res_log);
                return response()->json(['status'=>'ok','code'=>'200']);


            }
        }catch (\Exception $e){
            Log::channel('webhook')->error($e->getLine()."--".$e->getMessage());
            return response()->json(['status'=>'error','code'=>'400']);
        }

    }
}

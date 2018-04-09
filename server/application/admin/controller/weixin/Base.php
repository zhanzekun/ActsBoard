<?php

namespace app\admin\controller\weixin;

use app\admin\controller\ApiCommon;
use think\facade\Request;
class Base extends ApiCommon{

    static $appid="wxb569d7a3f448c503";
    static $secret="29938d5779d3dd83b9dab916f6e469d4";
    public function index(){
        return 'ok';
    }

    /**
     * 上传logo图片
     */
    public function uploadLoao(){

    }

    // 服务器接收来自微信用户客户端的code，调用getAccessToken函数获得用户的openid
    public function getCode(){
        // 微信客户端
        $result;

        $param=Request::post();
        if(isset($param['code'])){
            $code=$param['code'];
            $openid=$this->getAccessToken($code);
            if($openid){
                // 获取到了用户的openid
                // 在数据库创建创建用户，并返回用户的user_id
                $userModel = model('weixin.UserBase');
                $data=$userModel->userInfo($openid);
                $result['data']=$data;
                return resultArray($result);
            }
        }
        $result['error']="连接超时";
        return resultArray($result);
        
        // 服务器
        
    }

    // 服务器通过code向微信服务器获取用户的access_token
    /**
     * @param $code string 微信客户端传回的code
     */
    private function getAccessToken($code){
        $getAccessToken="https://api.weixin.qq.com/sns/oauth2/access_token?appid=".self::$appid."&secret=".self::$secret."&code=".$code."&grant_type=authorization_code";
        // 发起https的get请求
        $resultData=get_https($getAccessToken);
        $resultData=json_decode($resultData, true);
        if(isset($resultData['openid'])){
            return $resultData['openid'];
        } else{
            return false; 
        }
    }
}

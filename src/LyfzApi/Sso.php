<?php

namespace LyfzApi;


use LyfzApi\Http\Client;

/**
 * 单点登录系统 single sign on
 * https://www.kancloud.cn/lyfz/sso_lyfz/1803844
 * Class Sso
 * @package LyfzApi
 */
final class Sso
{
    private $AppId;
    private $AppSecret;
    private $accessToken;
    private $url;
    public function __construct($AppId, $AppSecret,$Env="product")
    {

        if ($Env=="dev"){
            $this->url=Config::DEV_LOGIN;
        }else{
            $this->url=Config::API_LOGIN;
        }
        $this->AppId = $AppId;
        $this->AppSecret = $AppSecret;
    }


    public function getAccessToken()
    {
        $url=$this->url."auth/token?appId=".$this->AppId."&secret=".$this->AppSecret;
        $ret = Client::Get($url);
        if (!$ret->ok()) {
            return \LyfzApi\return_error($ret->statusCode.":".$ret->error,$ret->jsonData);
        }
        return \LyfzApi\return_success($ret->jsonData);
    }

    public function setAccessToken($accessToken){
        $this->accessToken=$accessToken;
        return $this;
    }

    //  注册账户
    public function addUser($data)
    {
        $url=$this->url."other/addUser?accessToken=".$this->accessToken;

        $ret = Client::post($url,$data);

        if (!$ret->ok()) {
            return \LyfzApi\return_error($ret->statusCode.":".$ret->error,$ret->jsonData);
        }
        return \LyfzApi\return_success($ret->jsonData);
    }
    //  修改账户密码
    public function modifyPassword($data)
    {
        $url=$this->url."other/modifyPassword?accessToken=".$this->accessToken;

        $ret = Client::post($url,$data);

        if (!$ret->ok()) {
            return \LyfzApi\return_error($ret->statusCode.":".$ret->error,$ret->jsonData);
        }
        return \LyfzApi\return_success($ret->jsonData);
    }
//  校验ticket
    public function checkTicket($ticket)
    {
        $url=$this->url."other/checkTicket?accessToken=".$this->accessToken."&ticket=".$ticket;

        $ret = Client::get($url);

        if (!$ret->ok()) {
            return \LyfzApi\return_error($ret->statusCode.":".$ret->error,$ret->jsonData);
        }
        return \LyfzApi\return_success($ret->jsonData);
    }
    //  修改账户信息
    public function updateUser($data)
    {
        $url=$this->url."other/updateUser?accessToken=".$this->accessToken;

        $ret = Client::post($url,$data);

        if (!$ret->ok()) {
            return \LyfzApi\return_error($ret->statusCode.":".$ret->error,$ret->jsonData);
        }
        return \LyfzApi\return_success($ret->jsonData);
    }
    //  注销退出账号
    public function cancellation($ticket)
    {
        $url=$this->url."other/cancellation?accessToken=".$this->accessToken."&ticket=".$ticket;

        $ret = Client::get($url);

        if (!$ret->ok()) {
            return \LyfzApi\return_error($ret->statusCode.":".$ret->error,$ret->jsonData);
        }
        return \LyfzApi\return_success($ret->jsonData);
    }
    //  获取账号UID
    public function getUnumberEffectiveness($number)
    {
        $url=$this->url."other/getUnumberEffectiveness?accessToken=".$this->accessToken."&number=".$number;

        $ret = Client::get($url);

        if (!$ret->ok()) {
            return \LyfzApi\return_error($ret->statusCode.":".$ret->error,$ret->jsonData);
        }
        return \LyfzApi\return_success($ret->jsonData);
    }
    //  获取账户信息
    public function findByUid($uid)
    {
        $url=$this->url."other/findByUid?accessToken=".$this->accessToken."&uid=".$uid;

        $ret = Client::get($url);

        if (!$ret->ok()) {
            return \LyfzApi\return_error($ret->statusCode.":".$ret->error,$ret->jsonData);
        }
        return \LyfzApi\return_success($ret->jsonData);
    }
    //  获取unionid
    public function findUnionid($uid)
    {
        $url=$this->url."other/findUnionid?accessToken=".$this->accessToken."&uid=".$uid;

        $ret = Client::get($url);

        if (!$ret->ok()) {
            return \LyfzApi\return_error($ret->statusCode.":".$ret->error,$ret->jsonData);
        }
        return \LyfzApi\return_success($ret->jsonData);
    }
    //  解绑微信
    public function deleteWechat($uid)
    {
        $url=$this->url."other/deleteWechat?accessToken=".$this->accessToken."&uid=".$uid;

        $ret = Client::get($url);

        if (!$ret->ok()) {
            return \LyfzApi\return_error($ret->statusCode.":".$ret->error,$ret->jsonData);
        }
        return \LyfzApi\return_success($ret->jsonData);
    }
    //  设置灰度用户
    public function grayLevelAddUser($data)
    {
        $url=$this->url."other/grayLevelAddUser?accessToken=".$this->accessToken;

        $ret = Client::post($url,$data);

        if (!$ret->ok()) {
            return \LyfzApi\return_error($ret->statusCode.":".$ret->error,$ret->jsonData);
        }
        return \LyfzApi\return_success($ret->jsonData);
    }
    //  清除应用灰度用户
    public function grayLevelRemoveUser()
    {
        $url=$this->url."other/grayLevelRemoveUser?accessToken=".$this->accessToken;

        $ret = Client::get($url);

        if (!$ret->ok()) {
            return \LyfzApi\return_error($ret->statusCode.":".$ret->error,$ret->jsonData);
        }
        return \LyfzApi\return_success($ret->jsonData);
    }

}

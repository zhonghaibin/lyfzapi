<?php
namespace LyfzApi;

use LyfzApi\Http\Client;

/**
 * 企业中心 Enterprise Management Center
 * 文档链接https://www.kancloud.cn/lyfz/company_center
 * Class Emc
 * @package Lyfzcom
 */
final class Emc
{
    private $AppId;
    private $AppSecret;
    private $accessToken;
    private $url;
    public function __construct($AppId, $AppSecret,$Env="product")
    {

        if ($Env=="dev"){
            $this->url=Config::DEV_CENTER;
        }else{
            $this->url=Config::API_CENTER;
        }
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

    //  获取账户关联的企业信息
    public function companyList($uid)
    {
        $url=$this->url."other/companyList?accessToken=".$this->accessToken."&uid=".$uid;

        $ret = Client::get($url);

        if (!$ret->ok()) {
            return \LyfzApi\return_error($ret->statusCode.":".$ret->error,$ret->jsonData);
        }
        return \LyfzApi\return_success($ret->jsonData);
    }
    // 批量注册企业
    public function batchCompanyList($data)
    {
        $url=$this->url."other/batchCompanyList?accessToken=".$this->accessToken;

        $ret = Client::post($url,$data);

        if (!$ret->ok()) {
            return \LyfzApi\return_error($ret->statusCode.":".$ret->error,$ret->jsonData);
        }
        return \LyfzApi\return_success($ret->jsonData);
    }
    // 获取企业基本信息
    public function company($companyId)
    {
        $url=$this->url."other/company?accessToken=".$this->accessToken."&companyId=".$companyId;

        $ret = Client::get($url);

        if (!$ret->ok()) {
            return \LyfzApi\return_error($ret->statusCode.":".$ret->error,$ret->jsonData);
        }
        return \LyfzApi\return_success($ret->jsonData);
    }
    // 获取门店用户信息
    public function shopUserList($companyId,$shopId,$search='')
    {
        $url=$this->url."other/shopUserList?accessToken=".$this->accessToken."&companyId=".$companyId."&shopId=".$shopId."&search=".$search;

        $ret = Client::get($url);

        if (!$ret->ok()) {
            return \LyfzApi\return_error($ret->statusCode.":".$ret->error,$ret->jsonData);
        }
        return \LyfzApi\return_success($ret->jsonData);
    }
    // 获取企业基本信息
    public function companyUserList($companyId,$search='')
    {
        $url=$this->url."other/companyUserList?accessToken=".$this->accessToken."&companyId=".$companyId."&search=".$search;

        $ret = Client::get($url);

        if (!$ret->ok()) {
            return \LyfzApi\return_error($ret->statusCode.":".$ret->error,$ret->jsonData);
        }
        return \LyfzApi\return_success($ret->jsonData);
    }
    // 同步业务系统员工信息
    public function synchronizeCompanyUser($data)
    {
        $url=$this->url."other/synchronizeCompanyUser?accessToken=".$this->accessToken;

        $ret = Client::post($url,$data);

        if (!$ret->ok()) {
            return \LyfzApi\return_error($ret->statusCode.":".$ret->error,$ret->jsonData);
        }
        return \LyfzApi\return_success($ret->jsonData);
    }// 获取员工列表
    public function getUserInfoByUid($companyId,$uid)
    {
        $url=$this->url."other/getUserInfoByUid?accessToken=".$this->accessToken."&companyId=".$companyId."&uid=".$uid;

        $ret = Client::get($url);

        if (!$ret->ok()) {
            return \LyfzApi\return_error($ret->statusCode.":".$ret->error,$ret->jsonData);
        }
        return \LyfzApi\return_success($ret->jsonData);
    }
    // 企业uid账号关注公众号的状态
    public function checkIsFollow($companyId)
    {
        $url=$this->url."other/checkIsFollow?accessToken=".$this->accessToken."&companyId=".$companyId."&uid=".$uid;

        $ret = Client::get($url);

        if (!$ret->ok()) {
            return \LyfzApi\return_error($ret->statusCode.":".$ret->error,$ret->jsonData);
        }
        return \LyfzApi\return_success($ret->jsonData);
    }
    // 获取企业职位列表
    public function positionList($companyId,$uid)
    {
        $url=$this->url."other/positionList?accessToken=".$this->accessToken."&companyId=".$companyId."&uid=".$uid;

        $ret = Client::get($url);

        if (!$ret->ok()) {
            return \LyfzApi\return_error($ret->statusCode.":".$ret->error,$ret->jsonData);
        }
        return \LyfzApi\return_success($ret->jsonData);
    }
    // 获取企业行业职业类型列表
    public function positionTypeList($companyId,$industryId)
    {
        $url=$this->url."other/positionTypeList?accessToken=".$this->accessToken."&companyId=".$companyId."&industryId=".$industryId;

        $ret = Client::get($url);

        if (!$ret->ok()) {
            return \LyfzApi\return_error($ret->statusCode.":".$ret->error,$ret->jsonData);
        }
        return \LyfzApi\return_success($ret->jsonData);
    }
    //  批量添加门店
    public function batchShopList($data)
    {
        $url=$this->url."other/batchShopList?accessToken=".$this->accessToken;

        $ret = Client::post($url,$data);

        if (!$ret->ok()) {
            return \LyfzApi\return_error($ret->statusCode.":".$ret->error,$ret->jsonData);
        }
        return \LyfzApi\return_success($ret->jsonData);
    }
    // 获取企业门店列表
    public function shopList($companyId)
    {
        $url=$this->url."other/shopList?accessToken=".$this->accessToken."&companyId=".$companyId;

        $ret = Client::get($url);

        if (!$ret->ok()) {
            return \LyfzApi\return_error($ret->statusCode.":".$ret->error,$ret->jsonData);
        }
        return \LyfzApi\return_success($ret->jsonData);
    }

    //  获取企业组织架构及关联的员工
    public function userList($companyId)
    {
        $url=$this->url."other/userList?accessToken=".$this->accessToken."&companyId=".$companyId;

        $ret = Client::get($url);

        if (!$ret->ok()) {
            return \LyfzApi\return_error($ret->statusCode.":".$ret->error,$ret->jsonData);
        }
        return \LyfzApi\return_success($ret->jsonData);
    }
    // 获取企业组织架构
    public function organizationList($companyId)
    {
        $url=$this->url."other/organizationList?accessToken=".$this->accessToken."&companyId=".$companyId;

        $ret = Client::get($url);

        if (!$ret->ok()) {
            return \LyfzApi\return_error($ret->statusCode.":".$ret->error,$ret->jsonData);
        }
        return \LyfzApi\return_success($ret->jsonData);
    }
    // 同步业务系统部门列表
    public function batchOrganizationList($companyId,$data)
    {
        $url=$this->url."other/batchOrganizationList?accessToken=".$this->accessToken."&companyId=".$companyId;

        $ret = Client::post($url,$data);

        if (!$ret->ok()) {
            return \LyfzApi\return_error($ret->statusCode.":".$ret->error,$ret->jsonData);
        }
        return \LyfzApi\return_success($ret->jsonData);
    }
    // 批量添加角色
    public function batchRoleList($data)
    {
        $url=$this->url."other/batchRoleList?accessToken=".$this->accessToken;

        $ret = Client::post($url,$data);

        if (!$ret->ok()) {
            return \LyfzApi\return_error($ret->statusCode.":".$ret->error,$ret->jsonData);
        }
        return \LyfzApi\return_success($ret->jsonData);
    }
    // 业务系统初始化应用权限
    public function addModel($data)
    {
        $url=$this->url."other/addModel?accessToken=".$this->accessToken;

        $ret = Client::post($url,$data);

        if (!$ret->ok()) {
            return \LyfzApi\return_error($ret->statusCode.":".$ret->error,$ret->jsonData);
        }
        return \LyfzApi\return_success($ret->jsonData);
    }
    // 业务系统增加自定义权限
    public function addEspeciallyModel($data)
    {
        $url=$this->url."other/addEspeciallyModel?accessToken=".$this->accessToken;

        $ret = Client::post($url,$data);

        if (!$ret->ok()) {
            return \LyfzApi\return_error($ret->statusCode.":".$ret->error,$ret->jsonData);
        }
        return \LyfzApi\return_success($ret->jsonData);
    }// 批量添加员工角色
    public function batchUserList($data)
    {
        $url=$this->url."other/batchUserList?accessToken=".$this->accessToken;

        $ret = Client::post($url,$data);

        if (!$ret->ok()) {
            return \LyfzApi\return_error($ret->statusCode.":".$ret->error,$ret->jsonData);
        }
        return \LyfzApi\return_success($ret->jsonData);
    }
    // 获取角色权限列表
    public function getAuthList($companyId,$roleId='')
    {
        $url=$this->url."other/getAuthList?accessToken=".$this->accessToken."&companyId=".$companyId."&roleId=".$companyId."&$roleId=".$this->AppId;

        $ret = Client::get($url);

        if (!$ret->ok()) {
            return \LyfzApi\return_error($ret->statusCode.":".$ret->error,$ret->jsonData);
        }
        return \LyfzApi\return_success($ret->jsonData);
    }
    // 业务系统移除员工产品授权
    public function removeAuth($companyId,$uid)
    {
        $url=$this->url."other/removeAuth?accessToken=".$this->accessToken."&companyId=".$companyId."&uid=".$uid."&appId=".$this->AppId;

        $ret = Client::get($url);

        if (!$ret->ok()) {
            return \LyfzApi\return_error($ret->statusCode.":".$ret->error,$ret->jsonData);
        }
        return \LyfzApi\return_success($ret->jsonData);
    }
    // 业务系统批量添加产品授权员工
    public function addAppAuthUser($data)
    {
        $url=$this->url."other/addAppAuthUser?accessToken=".$this->accessToken;

        $ret = Client::post($url,$data);

        if (!$ret->ok()) {
            return \LyfzApi\return_error($ret->statusCode.":".$ret->error,$ret->jsonData);
        }
        return \LyfzApi\return_success($ret->jsonData);
    }
    // 获取员工权限列表
    public function findRoleListByUid()
    {
        $url=$this->url."other/findRoleListByUid?accessToken=".$this->accessToken;

        $ret = Client::get($url);

        if (!$ret->ok()) {
            return \LyfzApi\return_error($ret->statusCode.":".$ret->error,$ret->jsonData);
        }
        return \LyfzApi\return_success($ret->jsonData);
    }
}

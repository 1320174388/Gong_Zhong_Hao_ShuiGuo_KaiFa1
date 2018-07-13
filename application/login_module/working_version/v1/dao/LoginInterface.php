<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  LoginInterface.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/07/13 13:19
 *  文件描述 :  用户初始化登录数据处理声明接口
 *  历史记录 :  -----------------------
 */
namespace app\login_module\working_version\v1\dao;

interface LoginInterface{

    /**
     * 名  称 : applyCreate()
     * 功  能 : 声明：用户申请成为管理员接口
     * 变  量 : --------------------------------------
     * 输  入 : (int) $applyName     => '用户名';
     * 输  入 : (str) $applyPassward => '密码';
     * 输  入 : (int) $applyPhone    => '手机号';
     * 输  出 : ['msg'=>'success','data'=>true]
     * 输  出 : ['msg'=>'error'  ,'data'=>false]
     * 创  建 : 2018/07/13 13:19
     */
    public function loginCreate();
}
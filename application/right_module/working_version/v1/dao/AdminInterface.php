<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  AdminInterface.php
 *  创 建 者 :  Qi Yun Hai
 *  创建日期 :  2018/07/16 19:13
 *  文件描述 :  添加管理员表数据
 *  历史记录 :  -----------------------
 */

namespace app\right_module\working_version\v1\dao;

interface AdminInterface{
    /**
     * 名  称 : adminCreate()
     * 功  能 : 声明：添加管理员表接口
     * 变  量 : --------------------------------------
     * 输  入 : (String) $applyToken   => '身份令牌';
     * 输  入 : (String) $roleIndex    => '职位主键';
     * 输  出 : ['msg'=>'success','data'=>true]
     * 输  出 : ['msg'=>'error'  ,'data'=>false]
     * 创  建 : 2018/07/16 19:37
     */
    public function adminCreate($applyToken,$roleIndex);
}
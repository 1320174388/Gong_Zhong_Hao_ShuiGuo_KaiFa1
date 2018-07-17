<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  ApplyService.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/06/28 12:49
 *  文件描述 :  用户申请管理员业务逻辑
 *  历史记录 :  -----------------------
 */
namespace app\right_module\working_version\v1\service;

use app\right_module\working_version\v1\dao\ApplyDao;

class ApplyService
{
    /**
     * 名  称 : applyAdd()
     * 功  能 : 执行用户申请管理员操作
     * 变  量 : --------------------------------------
     * 输  入 : (String) $post['applyToken']      => '身份令牌';
     * 输  入 : (String) $post['applyName']       => '用户名';
     * 输  入 : (String) $post['applyPassward']   => '申请密码';
     * 输  入 : (String) $post['applyRePassword'] => '申请密码';
     * 输  入 : (String) $post['applyPhone']      => '手机号';
     * 输  出 : --------------------------------------
     * 创  建 : 2018/06/57 15:57
     */
    public function applyAdd($post)
    {
        // 执行数据写入
        $res = (new ApplyDao())->applyCreate(
            $post['applyToken'],
            $post['applyName'],
            $post['applyPassward'],
            $post['applyPhone']
        );
        // 验证数据
        if($res) return returnData('error');
        // 返回数据
        return returnData('success',true);
    }
    /**
     * 名  称 : applyGet()
     * 功  能 : 获取所有申请管理员数据
     * 变  量 : --------------------------------------
     * 输  入 : --------------------------------------
     * 输  出 : --------------------------------------
     * 创  建 : 2018/07/16 17:37
     */
    public function applyGet()
    {
        // 获取用户信息
        $list = (new ApplyDao())->applySelect();
        // 验证数据格式
        if($list['msg']=='error') return returnData('error');
        // 返回数据
        return returnData('success',$list['data']);
    }

    /**
     * 名  称 : adminAdd()
     * 功  能 : 添加管理员表数据
     * 变  量 : --------------------------------------
     * 输  入 : --------------------------------------
     * 输  出 : --------------------------------------
     * 创  建 : 2018/07/16 19:06
     */
    public function adminAdd()
    {
        // 添加管理员表数据
        $add = (new AdminDao())->adminCreate();
        // 验证数据格式
        if($add['msg']=='error') return returnData('error');
        // 返回数据
        return returnData('success',$add['data']);
    }
}
<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  ApplyController.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/06/27 10:35
 *  文件描述 :  用户申请管理员控制器
 *  历史记录 :  -----------------------
 */
namespace app\right_module\working_version\v1\controller;
use think\Controller;
use think\Request;

class ApplyController extends Controller
{
    /**
     * 名  称 : applyInit()
     * 功  能 : 执行用户申请管理员操作
     * 变  量 : --------------------------------------
     * 输  入 : (int) $applyName     => '用户名';
     * 输  入 : (str) $applyPassward => '密码';
     * 输  入 : (int) $applyPhone    => '手机号';
     * 输  出 : --------------------------------------
     * 创  建 : 2018/06/57 15:57
     */
    public function applyInit(Request $request)
    {
        // 验证传值数据
        $post = $request->post();
    }
}
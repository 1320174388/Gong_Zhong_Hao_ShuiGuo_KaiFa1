<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  RightController.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/07/11 11:33
 *  文件描述 :  用户申请管理员控制器
 *  历史记录 :  -----------------------
 */
namespace app\right_module\working_version\v1\controller;
use app\right_module\working_version\v1\service\RightServer;
use think\Controller;

class RightController extends Controller
{
    /**
     * 名  称 : rightList()
     * 功  能 : 获取所有权限管理列表数据
     * 变  量 : --------------------------------------
     * 输  入 : (String) $token => '管理员标识';
     * 输  出 : --------------------------------------
     * 创  建 : 2018/07/11 11:34
     */
    public function rightList($token)
    {
        $list = (new RightServer())->rightList($token);
    }
}
<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  ModuleController.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/07/11 11:07
 *  文件描述 :  用户管理模块控制器
 *  历史记录 :  -----------------------
 */
namespace app\right_module\working_version\v1\controller;
use think\Controller;
use think\Request;

class ModuleController extends Controller
{
    /**
     * 名  称 : obtainModule()
     * 功  能 : 获取管理员可管理模块的信息
     * 变  量 : --------------------------------------
     * 输  入 : (String) $token => '管理员标识';
     * 输  出 : --------------------------------------
     * 创  建 : 2018/07/11 09:53
     */
    public function obtainModule(Request $request)
    {
        return 123;
    }
}
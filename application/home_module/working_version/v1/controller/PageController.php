<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  PageController.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/07/12 10::23
 *  文件描述 :  前台首页控制器
 *  历史记录 :  -----------------------
 */
namespace app\home_module\working_version\v1\controller;
use think\Controller;

class PageController extends Controller
{
    /**
     * 名  称 : returnJson()
     * 功  能 : 没有执行权限
     * 变  量 : --------------------------------------
     * 输  入 : --------------------------------------
     * 输  出 : {"errNum":1,"retMsg":"没有执行权限","retData":false}
     * 创  建 : 2018/07/17 14:34
     */
    public function returnJson()
    {
        returnResponse(1,'没有执行权限');
    }
}
<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  ApplyController.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/06/27 10:35
 *  文件描述 :  后台管理员控制器
 *  历史记录 :  -----------------------
 */
namespace app\right_module\working_version\v1\controller;
use think\Controller;
use think\Request;
use app\right_module\working_version\v1\service\ApplyService;

class AdminController extends Controller
{
    /**
     * 名  称 : loginAdmin()
     * 功  能 : 公众号后台登录页面
     * 变  量 : --------------------------------------
     * 输  入 : --------------------------------------
     * 输  出 : --------------------------------------
     * 创  建 : 2018/07/16 09:54
     */
    public function loginAdmin()
    {
        // 获取用户申请管理员操作页面地址
        $url = config('qd_html_url.HTTP_URL');
        $url.= config('qd_html_url.Admin_Login');
        // 显示注册页面视图
        return "<script>
                    window.location.replace('{$url}');
               </script>";
    }

    /**
     * 名  称 : loginSign()
     * 功  能 : 执行公众号后台用户登录
     * 变  量 : --------------------------------------
     * 输  入 : --------------------------------------
     * 输  出 : --------------------------------------
     * 创  建 : 2018/07/16 11:08
     */
    public function loginSign()
    {

    }

    /**
     * 名  称 : applyList()
     * 功  能 : 获取管理员申请表数据
     * 变  量 : --------------------------------------
     * 输  入 : --------------------------------------
     * 输  出 : {"errNum":1,"retMsg":"提示信息","retData":"数据"}
     * 创  建 : 2018/07/16 16:55
     */
    public function applyList()
    {
        // 获取所有申请管理员数据
        $list = (new ApplyService())->applyGet();
        // 验证数据格式
        if($list['msg']=='error') return returnResponse(1,'没有管理员申请');
        // 返回数据
        return returnResponse(0,'请求成功',$list['data']);
    }

    /**
     * 名  称 : applyCreate()
     * 功  能 : 添加管理员表数据
     * 变  量 : --------------------------------------
     * 输  入 : (String) $applyToken => '身份令牌';
     * 输  入 : (Array) $roleIndex  => '职位数组';
     * 输  出 : {"errNum":1,"retMsg":"提示信息","retData":"数据"}
     * 创  建 : 2018/07/16 18:47
     */
    public function applyCreate(Request $request)
    {
        // 接收申请管理员
        $applyToken = $request->put('apply_token');
        $roleIndex  = $request->put('role_index');
        // 获取所有申请管理员数据
        $add = (new ApplyService())->adminAdd($applyToken,$roleIndex);
        // 验证数据格式
        if($add['msg']=='error') return returnResponse(1,'审核失败');
        // 返回数据格式
        return returnResponse(0,'审核成功',true);
    }
}
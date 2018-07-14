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
use think\facade\Session;
use app\login_module\working_version\v1\library\LoginLibrary;

class ModuleController extends Controller
{
    /**
     * 名  称 : moduleRoute()
     * 功  能 : 公众号后台初始化接口
     * 变  量 : --------------------------------------
     * 输  入 : (String) $token => '管理员标识';
     * 输  出 : --------------------------------------
     * 创  建 : 2018/07/13 13:15
     */
    public function  moduleRoute()
    {
        // 获取项目域名
        $projectUrl = $_SERVER["REQUEST_SCHEME"].'://';
        $projectUrl.= $_SERVER["SERVER_NAME"];
        $projectUrl.= '/v1/right_module/obtain_module';
        // 处理项目域名
        $route = urlencode($projectUrl);
        // 拼接公众号登录地址
        $url = 'https://open.weixin.qq.com/connect/oauth2/authorize';
        $url.= '?appid='.config('v1_config.AppID');
        $url.= '&redirect_uri='.$route;
        $url.= '&response_type=code&scope=snsapi_base';
        $url.= '&state=STATE#wechat_redirect';
        // 跳转公众号登录页面
        return '<script>window.location.replace("'.$url.'");</script>';
    }

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
        // 跨模块调用方法
        $loginLibrary = A('login_module://library/LoginLibrary');
        // 通过code换取网页授权access_token显示首页
        $array = $loginLibrary->loginLibrary($request->get('code'));
        // 验证token值
        if($array['msg']=='error') return $array['data'];
        // 保存token值到session中
        $strMd5 = md5($_SERVER["SERVER_NAME"].'login_user_token');
        Session::set($strMd5,$array['data']);
        // 显示页面
        return dump(Session::get($strMd5));
    }
}
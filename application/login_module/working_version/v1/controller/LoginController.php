<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  LoginController.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/06/27 10:35
 *  文件描述 :  用户登录控制器
 *  历史记录 :  -----------------------
 */
namespace app\login_module\working_version\v1\controller;
use think\Controller;
use think\Request;
use app\login_module\working_version\v1\library\LoginLibrary;
class LoginController extends Controller
{
    /**
     * 名  称 : loginRoute()
     * 功  能 : 公众号初始化接口
     * 变  量 : --------------------------------------
     * 输  入 : --------------------------------------
     * 输  出 : --------------------------------------
     * 创  建 : 2018/07/06 09:31
     */
    public function  loginRoute()
    {
        // 获取项目域名
        $projectUrl = $_SERVER["REQUEST_SCHEME"].'://';
        $projectUrl.= $_SERVER["SERVER_NAME"];
        $projectUrl.= '/login_module/login_init';
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
     * 名  称 : loginInit()
     * 功  能 : 通过code换取网页授权access_token，显示首页
     * 变  量 : --------------------------------------
     * 输  入 : (String) $code => '用户登录凭证code';
     * 输  出 : --------------------------------------
     * 创  建 : 2018/07/06 09:31
     */
    public function  loginInit(Request $request)
    {
        //
        $token = (new LoginLibrary())->loginLibrary($request->get('openid'));
        // 显示页面
        return "<h1>{$token}</h1>";
    }
}
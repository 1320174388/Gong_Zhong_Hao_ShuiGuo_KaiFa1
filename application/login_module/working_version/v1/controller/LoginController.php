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

class LoginController extends Controller
{
    /**
     * 名  称 : loginCeshi()
     * 功  能 : 公众号测试接口
     * 变  量 : --------------------------------------
     * 输  入 : (String)
     * 输  出 : --------------------------------------
     * 创  建 : 2018/07/06 09:31
     */
    public function  loginCeshi()
    {
        $route = urlencode('https://gongzhonghaokaifa1.dlaotianhuang.com/login_module/login_route');
        $url = 'https://open.weixin.qq.com/connect/oauth2/authorize';
        $url.= '?appid=wx0b50c8199226b3eb';
        $url.= '&redirect_uri='.$route;
        $url.= '&response_type=code&scope=snsapi_userinfo';
        $url.= '&state=STATE#wechat_redirect';
        return '<a href="'.$url.'">'.$url.'</a>';
    }
}
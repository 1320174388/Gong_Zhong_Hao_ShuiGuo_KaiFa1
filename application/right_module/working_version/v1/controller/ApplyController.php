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
use app\right_module\working_version\v1\service\ApplyService;
use app\right_module\working_version\v1\validator\ApplyValidate;
use app\right_module\working_version\v1\library\qcloudSmsLibrary;
use app\login_module\working_version\v1\library\LoginLibrary;

class ApplyController extends Controller
{
    /**
     * 名  称 : applyPreposition()
     * 功  能 : 管理员注册前置接口
     * 变  量 : --------------------------------------
     * 输  入 : --------------------------------------
     * 输  出 : --------------------------------------
     * 创  建 : 2018/07/16 11:15
     */
    public function applyPreposition()
    {
        // 获取项目域名
        $projectUrl = $_SERVER["REQUEST_SCHEME"].'://';
        $projectUrl.= $_SERVER["SERVER_NAME"];
        $projectUrl.= '/v1/right_module/login_preposition';
        // 处理项目域名
        $route = urlencode($projectUrl);
        // 拼接公众号登录地址
        $url = 'https://open.weixin.qq.com/connect/oauth2/authorize';
        $url.= '?appid='.config('v1_config.AppID');
        $url.= '&redirect_uri='.$route;
        $url.= '&response_type=code&scope=snsapi_base';
        $url.= '&state=STATE#wechat_redirect';
        // 跳转公众号后台登录页面
        return '<script>window.location.replace("'.$url.'");</script>';
    }

    /**
     * 名  称 : applyRegister()
     * 功  能 : 显示管理员注册页面
     * 变  量 : --------------------------------------
     * 输  入 : --------------------------------------
     * 输  出 : --------------------------------------
     * 创  建 : 2018/07/16 11:15
     */
    public function applyRegister(Request $request)
    {
        // 通过code换取网页授权access_token显示首页
        $array = (new LoginLibrary())->loginLibrary($request->get('code'));
        // 验证token值
        if($array['msg']=='error') return '<h1>身份验证失败<h1>';
        // 获取用户申请管理员操作页面地址
        $url = config('qd_html_url.HTTP_URL');
        $url.= config('qd_html_url.Admin_Register');
        // 显示注册页面视图
        return "<script>
                    window.location.replace('{$url}?token={$array['data']}');
               </script>";
    }

    /**
     * 名  称 : applyInit()
     * 功  能 : 执行用户申请管理员操作
     * 变  量 : --------------------------------------
     * 输  入 : (String) $post['applyToken']      => '身份令牌';
     * 输  入 : (String) $post['applyName']       => '用户名';
     * 输  入 : (String) $post['applyPassward']   => '申请密码';
     * 输  入 : (String) $post['applyRePassword'] => '申请密码';
     * 输  入 : (String) $post['applyPhone']      => '手机号';
     * 输  出 : --------------------------------------
     * 创  建 : 2018/07/16 11:16
     */
    public function applyInit(Request $request)
    {
        // 引入Validate数据验证器
        $validate = new ApplyValidate();
        // 验证数据
        if (!$validate->check($request->post()))
        {
            return $validate->getError();
        }
        // 引入Service数据逻辑
        $res = (new ApplyService())->applyAdd($request->post());
        // 验证数据
        if(!$res) return var_dump(false);
        else return var_dump(true);
    }

    /**
     * 名  称 : applyCode()
     * 功  能 : 给用户发送验证码
     * 变  量 : --------------------------------------
     * 输  入 : (String)
     * 输  出 : --------------------------------------
     * 创  建 : 2018/07/10 10:54
     */
    public function applyCode()
    {
        $phoneNumber = '手机号';
        $textMessage = '您在中春果业平台做了申请管理员操作，验证码：';
        $textMessage.= mt_rand(111111,999999);
        $textMessage.= '，请于5分钟之内填写。如非本人操作，请忽略本条短信。';
        $res = (new qcloudSmsLibrary())->sendMessige(
            $phoneNumber,
            $textMessage
        );
        if($res['msg']=='error') return print_r($res['data']);
        return print_r($res['data']);
    }
}
<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  ResetController.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/06/27 10:35
 *  文件描述 :  用户找回密码控制器
 *  历史记录 :  -----------------------
 */
namespace app\right_module\working_version\v1\controller;
use think\Controller;
use think\Request;
use app\right_module\working_version\v1\library\qcloudSmsLibrary;
use app\right_module\working_version\v1\validator\ResetRValidator;
class ResetController extends Controller
{
    /**
     * 名  称 : judgePhone()
     * 功  能 : 判断用户手机号是否正确
     * 变  量 : --------------------------------------
     * 输  入 : (String) $judgePhone => '手机号';
     * 输  入 : (String) $judgeCode  => '验证码';
     * 输  出 : --------------------------------------
     * 创  建 : 2018/07/11 09:53
     */
    public function judgePhone(Request $request)
    {

    }

    /**
     * 名  称 : resetCode()
     * 功  能 : 给用户发送验证码
     * 变  量 : --------------------------------------
     * 输  入 : (String) $judgePhone => '手机号';
     * 输  出 : --------------------------------------
     * 创  建 : 2018/07/11 09:53
     */
    public function resetCode()
    {
        $phoneNumber = '手机号';
        $textMessage = '您在中春果业平台做了找回密码操作，验证码：';
        $textMessage.= mt_rand(111111,999999);
        $textMessage.= '，请于5分钟之内填写。如非本人操作，请忽略本条短信。';
        $res = (new qcloudSmsLibrary())->sendMessige(
            $phoneNumber,
            $textMessage
        );
        if($res['msg']=='error') return print_r($res['data']);
        return print_r($res['data']);
    }

    /**
     * 名  称 : resetPassword()
     * 功  能 : 用户重置密码接口
     * 变  量 : --------------------------------------
     * 输  入 : (String)
     * 输  出 : --------------------------------------
     * 创  建 : 2018/07/11 09:53
     */
    public function resetPassword()
    {
        $validate = new ResetRValidator();
    }
}
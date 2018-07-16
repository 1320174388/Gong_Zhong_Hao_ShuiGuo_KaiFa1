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

class ApplyController extends Controller
{
    /**
     * 名  称 : applyRegister()
     * 功  能 : 显示管理员注册页面
     * 变  量 : --------------------------------------
     * 输  入 : --------------------------------------
     * 输  出 : --------------------------------------
     * 创  建 : 2018/07/16 11:15
     */
    public function applyRegister()
    {
        return view('/v1/adminRegister');
    }

    /**
     * 名  称 : applyInit()
     * 功  能 : 执行用户申请管理员操作
     * 变  量 : --------------------------------------
     * 输  入 : (str) $post['applyName']       => '用户名';
     * 输  入 : (str) $post['applyPassward']   => '申请密码';
     * 输  入 : (str) $post['applyRePassword'] => '申请密码';
     * 输  入 : (str) $post['applyPhone']      => '手机号';
     * 输  出 : --------------------------------------
     * 创  建 : 2018/06/57 15:57
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
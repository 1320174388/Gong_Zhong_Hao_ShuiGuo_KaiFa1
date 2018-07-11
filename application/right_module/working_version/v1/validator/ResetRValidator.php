<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  ResetRValidator.php
 *  创 建 者 :  Shi Rui
 *  创建日期 :  2018/07/11 11:08
 *  文件描述 :  用户重置密码验证器
 *  历史记录 :  -----------------------
 */
namespace app\right_module\working_version\v1\validator;
use think\Validate;

class ResetRValidator extends Validate
{
    /**
     * 名  称 : $rule => '静态属性'
     * 功  能 : 定义验证规则
     * 输  入 : (str) $post['applyRePassword'] => '申请密码';
     * 创  建 : 2018/07/11 11:13
     */
    protected $rule = [
        'applyPassward'   =>  'require|min:6|max:18',
        'applyRePassword' =>  'require|confirm:applyPassward',
    ];
    /**
     * 名  称 : $message => '静态属性'
     * 功  能 : 定义错误返回信息
     * 创  建 : 2018/01/1 11:13
     */
    protected $message  =   [
        'applyPassward.require'   => '请输入密码',
        'applyPassward.min'       => '密码不能少于6位',
        'applyPassward.max'       => '密码输入过长',
        'applyRePassword.require' => '请确认密码',
        'applyRePassword.confirm' => '两次输入密码不一致',
    ];
}
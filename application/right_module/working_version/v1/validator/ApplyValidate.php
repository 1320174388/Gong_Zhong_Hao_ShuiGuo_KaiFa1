<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  ApplyValidate.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/06/28 12:51
 *  文件描述 :  用户申请数据验证器
 *  历史记录 :  -----------------------
 */
namespace app\right_module\working_version\v1\validator;
use think\Validate;

class ApplyValidate extends Validate
{
    /**
     * 名  称 : $rule => '静态属性'
     * 功  能 : 定义验证规则
     * 输  入 : (str) $post['applyName']       => '用户名';
     * 输  入 : (str) $post['applyPassward']   => '申请密码';
     * 输  入 : (str) $post['applyRePassword'] => '申请密码';
     * 输  入 : (str) $post['applyPhone']      => '手机号';
     * 创  建 : 2018/06/57 15:57
     */
    protected $rule = [
        'applyName'       =>  'require|max:6',
        'applyPassward'   =>  'require|min:6|max:18',
        'applyRePassword' =>  'require|min:6|max:18',
        'applyPhone'      =>  'require|min:11|max:11',
    ];
}
<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  right_route.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/06/27 10:35
 *  文件描述 :  权限管理路由文件
 *  历史记录 :  -----------------------
 */

// +---------------------------------------------------
// : 传值方式：POST，功能：权限管理，用户申请管理员
// : 传值方式：GET， 功能：权限管理，给用户发送管理员申请验证码
// : 传值方式：GET， 功能：权限管理，管理员找回密码验证手机号
// : 传值方式：GET， 功能：权限管理，给用户发送管理员找回密码验证码
// : 传值方式：PUT， 功能：权限管理，管理员修改密码接口
// +---------------------------------------------------
Route::post(
    '/right_module/apply_route',
    'right_module/v1.controller.ApplyController/applyInit'
);
Route::get(
    '/right_module/apply_code',
    'right_module/v1.controller.ApplyController/applyCode'
);
Route::get(
    '/right_module/judge_phone',
    'right_module/v1.controller.ResetController/judgePhone'
);
Route::get(
    '/right_module/reset_code',
    'right_module/v1.controller.ResetController/resetCode'
);
Route::put(
    '/right_module/reset_password',
    'right_module/v1.controller.ResetController/resetPassword'
);
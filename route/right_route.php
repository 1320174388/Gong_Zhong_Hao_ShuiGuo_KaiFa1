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
// : 传值方式：GET， 功能：权限管理，管理员登录接口
// : 传值方式：POST，功能：权限管理，执行管理员登录功能
// : 传值方式：GET， 功能：权限管理，管理员注册前置接口
// : 传值方式：GET， 功能：权限管理，管理员注册页面
// +---------------------------------------------------
Route::post(
    'v1/right_module/apply_route',
    'right_module/v1.controller.ApplyController/applyInit'
);
Route::get(
    'v1/right_module/apply_code',
    'right_module/v1.controller.ApplyController/applyCode'
);
Route::get(
    'v1/right_module/judge_phone',
    'right_module/v1.controller.ResetController/judgePhone'
);
Route::get(
    'v1/right_module/reset_code',
    'right_module/v1.controller.ResetController/resetCode'
);
Route::put(
    'v1/right_module/reset_password',
    'right_module/v1.controller.ResetController/resetPassword'
);
Route::get(
    'v1/right_module/login_admin',
    'right_module/v1.controller.AdminController/loginAdmin'
);
Route::get(
    'v1/right_module/login_preposition',
    'right_module/v1.controller.ApplyController/applyPreposition'
);
Route::get(
    'v1/right_module/login_register',
    'right_module/v1.controller.ApplyController/applyRegister'
);
// +---------------------------------------------
// : 后台接口
// +---------------------------------------------
Route::group('v1/right_module/', function(){
    /**
     * 传值方式：GET， 功能：获取管理员可管理权限接口
     * 传值方式：GET， 功能：获取所有权限管理列表数据
     * 传值方式：GET， 功能：获取所有申请管理员数据
     */
    Route::get(
        'obtain_module',
        'right_module/v1.controller.ModuleController/obtainModule'
    );
    Route::get(
        'right_list',
        'right_module/v1.controller.RightController/rightList'
    );
    Route::get(
        'apply_list',
        'right_module/v1.controller.AdminController/applyList'
    );
    Route::post(
        'right_list',
        'right_module/v1.controller.RightController/rightAdd'
    );
    Route::put(
        'right_list',
        'right_module/v1.controller.RightController/rightPut'
    );
    Route::DELETE(
        'right_list',
        'right_module/v1.controller.RightController/rightDel'
    );
    Route::put(
        'apply_add',
        'right_module/v1.controller.AdminController/applyCreate'
    );
})->middleware('Right_v1_IsAdmin');
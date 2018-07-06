<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  login_route.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/06/27 10:35
 *  文件描述 :  前台页面路由文件
 *  历史记录 :  -----------------------
 */
// +----------------------------------
// : 传值方式：GET  ，功能：初始化接口
// : 传值方式：GET  ，功能：执行登录接口
// +----------------------------------
Route::get(
    '/login_module/login_route',
    'login_module/v1.controller.LoginController/loginRoute'
);
Route::get(
    '/login_module/login_init',
    'login_module/v1.controller.LoginController/loginInit'
);

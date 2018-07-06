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
// : 测试接口
// +----------------------------------
Route::get(
    '/login_module/login_route',
    'login_module/v1.controller.LoginController/loginCeshi'
);

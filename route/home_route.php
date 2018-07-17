<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  home_route.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/07/17 14:41
 *  文件描述 :  前台页面路由文件
 *  历史记录 :  -----------------------
 */
// +----------------------------------
// : 传值方式：GET  ，功能：公众号初始化接口
// +----------------------------------
Route::get(
    '/v1/home_module/return_json',
    'home_module/v1.controller.PageController/returnJson'
);

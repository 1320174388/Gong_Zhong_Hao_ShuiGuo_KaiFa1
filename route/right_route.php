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
// : 权限管理：用户申请管理员
// +---------------------------------------------------
Route::rule(
    '/right_module/apply_route',
    'right_module/v1.controller.ApplyController/applyInit'
);
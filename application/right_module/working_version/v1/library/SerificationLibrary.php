<?php

/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  SerificationLibrary.php
 *  创 建 者 :  Shi Rui
 *  创建日期 :  2018/07/16 16:48
 *  文件描述 :  判断缓存验证码
 *  历史记录 :  -----------------------
 */

namespace app\right_module\working_version\v1\library;
use think\facade\Cache;

class SerificationLibrary
{
    public function serifiCation($phone,$code)
    {
        if($code !== Cache::get('code')){
            return returnData(1,'没有验证码');
        }

        if($code !== Cache::get('phone')){
            return returnData(1,'验证码错误');
        }
        return returnData(0,'验证码正确');
    }
}
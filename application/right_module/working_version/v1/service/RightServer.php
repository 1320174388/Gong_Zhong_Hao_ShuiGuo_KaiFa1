<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  RightServer.php
 *  创 建 者 :  Shi Rui
 *  创建日期 :  2018/07/7 18:17
 *  文件描述 :
 *  历史记录 :  -----------------------
 */
namespace app\right_module\working_version\v1\service;

use app\right_module\working_version\v1\dao\RightDao;

class RightServer
{
    public function rightList($token)
    {
        $list = (new RightDao())->rightList($token);
    }
}
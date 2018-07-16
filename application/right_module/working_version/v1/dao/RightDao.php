<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  RightDao.php
 *  创 建 者 :  Shi Rui
 *  创建日期 :  2018/07/21 18:21
 *  文件描述 :
 *  历史记录 :  -----------------------
 */

namespace app\right_module\working_version\v1\dao;

use app\right_module\working_version\v1\model\RightModel;

class RightDao
{
    public function rightList($token)
    {
        // 获取数据库职位信息
        $RightModel = new RightModel;
        // 查询职位信息
        $user = $RightModel->select();
        // 返回数据格式
        return returnData('success',$user);
    }
}
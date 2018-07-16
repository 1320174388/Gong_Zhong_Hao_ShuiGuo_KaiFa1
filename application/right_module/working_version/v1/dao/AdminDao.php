<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  AdminDao.php
 *  创 建 者 :  Qi Yun Hai
 *  创建日期 :  2018/07/16 19:26
 *  文件描述 :  添加管理员表数据
 *  历史记录 :  -----------------------
 */
namespace app\right_module\working_version\v1\dao;

use app\right_module\working_version\v1\model\AdminModel;
use app\right_module\working_version\v1\model\ApplyModel;
use think\Db;
use app\right_module\working_version\v1\model\RoleModel;

class AdminDao implements AdminInterface
{
    /**
     * 名  称 : adminCreate()
     * 功  能 : 声明：添加管理员表接口
     * 变  量 : --------------------------------------
     * 输  入 : (String) $applyToken => '身份令牌';
     * 输  入 : (Array) $roleIndex  => '职位主键';
     * 输  出 : ['msg'=>'success','data'=>true]
     * 输  出 : ['msg'=>'error'  ,'data'=>false]
     * 创  建 : 2018/07/16 19:38
     */
    public function adminCreate($applyToken,$roleIndex)
    {
        // 启动事务
        Db::startTrans();
        try {
            // 实例化职位表
            $roleModel = new RoleModel();
            // 实例化申请表
            $applyModel = new ApplyModel();
            // 验证职位是否存在
            if(!$roleIndex) return returnData('error',false);
            // 删除用户申请表数据
            $res = $applyModel->where('apply_token',$applyToken)
                              ->delete();
            // 判断是否删除成功
            if(!$res) return returnData('error',false);
            // 添加到职位表与数据关联表
            $roleModel->role_index = $roleIndex;

            // 提交事务
            Db::commit();   return returnData('success',true);
        } catch (\Exception $e) {
            // 回滚事务
            Db::rollback(); return returnData('error',false);
        }
    }
}

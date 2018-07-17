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
     * 输  入 : (Array) $roleIndex  => '职位数组';
     * 输  出 : ['msg'=>'success','data'=>true]
     * 输  出 : ['msg'=>'error'  ,'data'=>false]
     * 创  建 : 2018/07/16 19:38
     */
    public function adminCreate($applyToken,$roleIndex)
    {
        // 启动事务
        Db::startTrans();
        try {
            // 实例化管理员表
            $adminModel = new AdminModel();
            // 实例化申请表
            $applyModel = new ApplyModel();
            // 验证职位是否存在
            if(!$roleIndex) return returnData('error',false);
            // 查询申请表
            $data = $applyModel->where('apply_token',$applyToken)
                               ->select();
            // 验证
            if(!$data) return returnData('error','没有此申请');
            // 保存到管理员表
            $adminModel->admin_token    = $data['apply_token'];
            $adminModel->admin_name     = $data['apply_name'];
            $adminModel->admin_passward = $data['apply_passward'];
            $adminModel->admin_phone    = $data['apply_phone'];
            $adminModel->admin_time     = $data['apply_time'];
            $result = $adminModel->save();
            // 验证
            if(!$result) return returnData('error','审核失败');
            // 删除申请表数据
            $applyModel->where('apply_token',$applyToken)
                       ->delete();
            // 添加到关联表
            $arr = array();
            foreach($roleIndex as $k=>$v){
                $arr[$k]=[
                    'admin_token'=>$applyToken,
                    'role_index' =>$v
                ];
            }
            // 获取配置表信息
            $table = config('v1_tableName.AdminRole');
            $saveData = Db::table($table)->insertAll($arr);
            // 验证
            if(!$saveData) return returnData('error',false);
            // 提交事务
            Db::commit();   return returnData('success',true);
        } catch (\Exception $e) {
            // 回滚事务
            Db::rollback(); return returnData('error',false);
        }
    }
}

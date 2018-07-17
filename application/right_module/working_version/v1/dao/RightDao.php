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
use think\Db;
class RightDao
{
    /**
     * 名  称 : rightList()
     * 功  能 : 声明：查询职位
     * 变  量 : --------------------------------------
     * 输  入 : --------------------------------------
     * 输  出 : [ 'msg'=>'success', 'data'=>$user ]
     * 创  建 : 2018/07/16 21:45
     */
    public function rightList()
    {
        // 获取数据库职位信息
        $RightModel = new RightModel;
        // 查询职位信息
        $user = $RightModel->select();
        // 返回数据格式
        return returnData('success',$user);
    }


    /**
     * 名  称 : rightList()
     * 功  能 : 声明：添加职位
     * 变  量 : --------------------------------------
     * 输  入 : (string) $name  => '职位名称';
     * 输  入 : (string) $info  => '权限介绍';
     * 输  出 : [ 'msg'=>'success', 'data'=>$user ]
     * 创  建 : 2018/07/16 21:45
     */
    public function rightAdd($name,$info)
    {
        // 实例化职位模型
        $RightModel = new RightModel;
        // 生成职位token身份标识
        $RightModel->role_index = userToken();
        // 职位名称
        $RightModel->role_name = $name;
        // 职位介绍
        $RightModel->role_info = $info;
        // 创建时间
        $RightModel->role_time = time();
        // 保存数据库
        $res = $RightModel->save();

        $arr = array();
        foreach($RightModel as $k=>$v){
            $arr[$k]=[
              'role_index'=>userToken(),
              'right_index'=>$v
            ];
        }
        $table = config('v1_tableName.RightsTable');
        $rights = Db::table($table)->insertAll($arr);
        if(!$rights) return returnData('error',false);
        // 验证是否保存成功
        if(!$res){
            return returnData('error');
        }
        // 返回数据格式
        return returnData('success',true);
    }

    /**
     * 名  称 : rightList()
     * 功  能 : 声明：修改职位
     * 变  量 : --------------------------------------
     * 输  入 : (string) $name => '职位名称';
     * 输  入 : (string) $info => '职位介绍';
     * 输  出 : [ 'msg'=>'success', 'data'=>$res ]
     * 创  建 : 2018/07/16 21:45
     */
    public function rightPut($name,$info)
    {
        // 实例化模型
        $RightModel = new RightModel;
        $table = config('v1_tableName.RightsTable');
        // 处理数据
        $RightModel->role_name = $name;
        $RightModel->role_info = $info;
        $right = $table::where('role_index', $table)->find();
        // 启动事务
        Db::startTrans();
        try {
            $table::get($right)->delete();
            $arr = array();
            foreach($table as $k=>$v){
                $arr[$k]=[
                    'role_index'=>userToken(),
                    'right_index'=>$v
                ];
            }
            $rights = Db::table($table)->insertAll($arr);
            if(!$rights) return returnData('error',false);
        } catch (\Exception $e) {
            // 回滚事务
            Db::rollback();
            // 验证数据
            return returnData('error','删除失败');
        }
        // 保存数据
        $res = $RightModel->save();
        if(!$res) return returnData('error');
        // 返回数据
        return returnData('success',true);

    }


    /**
     * 名  称 : rightList()
     * 功  能 : 声明：删除职位
     * 变  量 : --------------------------------------
     * 输  入 : (string) $info => '职位主键';
     * 输  出 : [ 'msg'=>'success', 'data'=>$res ]
     * 创  建 : 2018/07/16 21:45
     */
    public function rightDel($info)
    {
        // 获取表明
        $table = config('v1_tableName.RightTable');
        // 删除权限列表数据
        $res = RightModel::destroy([$table => $info]);
        // 验证数据是否删除成功
        if(!$res) return returnData('error','职位删除失败');
        // 返回数据
        return returnData('success',true);

    }
}
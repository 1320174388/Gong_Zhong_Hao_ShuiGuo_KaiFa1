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
    /**
     * 名  称 : rightList()
     * 功  能 : 查询职位
     * 变  量 : --------------------------------------
     * 输  入 : --------------------------------------
     * 输  出 : [ 'msg'=>'success' , 'data'=>$list['data'] ]
     * 创  建 : 2018/07/16 20:29
     */
    public function rightList()
    {
        $list = (new RightDao())->rightList();

        return returnData('success',$list['data']);
    }

    /**
     * 名  称 : rightAdd()
     * 功  能 : 添加职位
     * 变  量 : --------------------------------------
     * 输  入 : (string) $name  => '职位名称';
     * 输  入 : (string) $info  => '职位介绍';
     * 输  出 : [ 'msg'=>'success' , 'data'=>$list['data'] ]
     * 创  建 : 2018/07/16 20:29
     */
    public function rightAdd($name,$info)
    {
        //引入DAO层逻辑
        $list = (new RightDao())->rightAdd($name,$info);
        //验证职位是否存在
        if($list['msg']=='success') return returnData('error','职位已存在');
        // 验证是否添加成功
        if($list['msg']=='error') return returnData('error','添加失败');
        // 返回数据
        return returnData('success',$list['data']);
    }

    /**
     * 名  称 : rightPut()
     * 功  能 : 修改职位
     * 变  量 : --------------------------------------
     * 输  入 : (string) $name  => '职位名称';
     * 输  入 : (string) $info  => '职位介绍';
     * 输  出 : [ 'msg'=>'success' , 'data'=>$list['data'] ]
     * 创  建 : 2018/07/16 20:29
     */
    public function rightPut($name,$info)
    {
        // 引入DAO层逻辑
        $list = (new RightDao())->rightPut($name,$info);

        return returnData('success',$list['data']);
    }

    /**
     * 名  称 : rightDel()
     * 功  能 : 删除职位
     * 变  量 : --------------------------------------
     * 输  入 : --------------------------------------
     * 输  出 : --------------------------------------
     * 创  建 : 2018/07/16 20:29
     */
    public function rightDel($info)
    {
        $list = (new RightDao())->rightDel($info);

        return returnData('success',$list['data']);
    }
}
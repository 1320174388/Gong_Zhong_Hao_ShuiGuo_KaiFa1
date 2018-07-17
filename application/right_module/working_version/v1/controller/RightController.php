<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  RightController.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/07/11 11:33
 *  文件描述 :  用户申请管理员控制器
 *  历史记录 :  -----------------------
 */
namespace app\right_module\working_version\v1\controller;
use app\right_module\working_version\v1\service\RightServer;
use think\Controller;
use think\Request;

class RightController extends Controller
{
    /**
     * 名  称 : rightList()
     * 功  能 : 获取所有职位列表数据
     * 变  量 : --------------------------------------
     * 输  入 : --------------------------------------
     * 输  出 : {"errNum":0,"retMsg":"请求成功","retData":true}
     * 创  建 : 2018/07/11 11:34
     */
    public function rightList()
    {
        // 引入SERVER层逻辑
        $list = (new RightServer())->rightList();
        if($list['msg']=='error') return returnResponse(1,'当前没有添加职位');
        // 返回数据
        return returnResponse(0,'请求成功',$list['data']);

    }

    /**
     * 名  称 : rightAdd()
     * 功  能 : 添加职位数据
     * 变  量 : --------------------------------------
     * 输  入 : (string) $name  => '职位名称';
     * 输  入 : (string) $info  => '职位介绍';
     * 输  出 : {"errNum":0,"retMsg":"添加成功","retData":true}
     * 创  建 :
     */
    public function rightAdd(Request $request)
    {
        // 获取前端提交的职位数据
        $name = $request->post('role_name');
        $info  = $request->post('role_info');
        // 传值参数
        if(!$name)return returnResponse(1,'职位名称为空');
        if(!$info) return returnResponse(2,'职位介绍为空');
        // 引入逻辑代码，执行用户申请操作
        $res = (new RightServer())->rightAdd($name,$info);
        // 判断用户是否申请成功
        if($res['msg']=='error')return returnResponse(4,'已有职位');
        if($res['msg']=='error')return returnResponse(5,'添加失败');
        // 返回接口响应数据
        return returnResponse(0,'添加成功',$res['data']);
    }

    /**
     * 名  称 : rightPut()
     * 功  能 : 修改职位数据
     * 变  量 : --------------------------------------
     * 输  入 : (string) $name      => '职位名称';
     * 输  入 : (string) $info      => '职位介绍';
     * 输  出 : {"errNum":0,"retMsg":"更新成功","retData":true}
     * 创  建 :
     */
    public function rightPut(Request $request)
    {
        // 获取传值
        $name  = $request->put('role_name');
        $info  = $request->put('role_info');
        // 验证数据
        if(!$name )   return returnResponse(1,'请输入职位名称');
        if(!$info) return returnResponse(1,'请输入职位介绍');
        // 引入RoleService逻辑
        $res=(new RightServer())->rightPut($name,$info);
        // 验证返回数据
        if($res['msg']=='error') return returnResponse(3,$res['data']);
        // 返回数据
        return returnResponse(0,'更新成功',true);
    }

    /**
     * 名  称 : rightDel()
     * 功  能 : 删除职位数据
     * 变  量 : --------------------------------------
     * 输  入 : (string) $index => '职位标识';
     * 输  出 : {"errNum":0,"retMsg":"删除成功","retData":true}
     * 创  建 :
     */
    public function rightDel(Request $request)
    {
        // 获取传值
        $index = $request->put('role_index');
        // 验证数据
        if( !$index ) return returnResponse(1,'请输入权限标识');
        // 引入Service逻辑层代码
        $res = (new RightServer())->rightDel($index);
        if($res['msg']=='error') return returnResponse(1,$res['data']);
        // 返回数据
        return returnResponse(0,'删除成功',$res['data']);

    }

}
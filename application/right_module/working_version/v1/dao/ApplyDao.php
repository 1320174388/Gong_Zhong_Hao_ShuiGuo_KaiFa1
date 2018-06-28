<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  ApplyDao.php
 *  创 建 者 :  Qi Yun Hai
 *  创建日期 :  2018/06/28 15:09
 *  文件描述 :  数据持久层,操作Apply：Model模型处理数据
 *  历史记录 :  -----------------------
 */

namespace app\right_module\working_version\v1\dao;

use app\right_module\working_version\v1\model\ApplyModel;

class ApplyDao implements ApplyInterface
{
	/**
     * 名  称 : applySelect()
     * 功  能 : 声明：添加用户申请数据
     * 变  量 : --------------------------------------
     * 输  入 : (string) $applyName => 'applyToken';
     * 输  入 : (string) $applyPassward => 'applyToken';
	 * 输  入 : (string) $applyPhone => 'applyToken';
     * 输  出 : [ 'msg' => 'success', 'data' => true ]
     * 输  出 : [ 'msg' => 'error',  'data' => false ]
     * 创  建 : 2018/6/28 15:15
     */
	public function applyCreate($applyName,$applyPassward,$applyPhone)
	{
		// 实例化用户申请model
		$ApplyModel = new ApplyModel;
		// 自动生成管理员身份验证
		$ApplyModel->apply_token     = righeToken();
		// 获取用户申请的用户名
		$ApplyModel->apply_name     = $applyName;
		// 获取用户申请的密码
		$ApplyModel->apply_passward = $applyPassward;
		// 获取用户申请的手机号
		$ApplyModel->apply_phone    = $applyPhone;
		// 用户申请时间
		$ApplyModel->apply_time	   = time();
		// 保存数据库
		$res = $ApplyModel->save();
		// 验证数据
		if(!$res){
			return returnData('error',false);
		}
		return returnData('success',true);
	}

	/**
     * 名  称 : applySelect()
     * 功  能 : 声明：查询用户数据
     * 变  量 : --------------------------------------
     * 输  入 : (string) $applyToken => 'applyToken';
     * 输  出 : [ 'msg' => 'success', 'data' => '数据' ]
     * 输  出 : [ 'msg' => 'error',  'data' => false ]
     * 创  建 : 2018/6/28 15:23
     */
	public function applySelect($applyToken='')
	{
		// 获取数据库用户信息
		$ApplyModel = new ApplyModel;
		// 判断查询为单个用户还是所有用户
		// 如果$applyToken为空字符串,就查询所有
		if($applyToken==''){
			$user = $ApplyModel->select();
		}else{
			// 不为空字符串,就查询单条传过来的数据
			$user = $ApplyModel->where('applyToken',$applyToken)->find();
		}
		// 验证数据
		if(!$user){
			return returnData('error',false);
		}
		return returnData('success',$user);
	}
}
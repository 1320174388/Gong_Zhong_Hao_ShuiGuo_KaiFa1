<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  Http_Key.php
 *  创 建 者 :  Shi Guang Yu
 *  创建日期 :  2018/07/07 11:36
 *  文件描述 :  v1_HTTP_KEY_验证
 *  历史记录 :  -----------------------
 */
namespace app\http\middleware;
use think\Request;

class Http_IP_IsBenJi
{
    /**
     * 名  称 : handle()
     * 功  能 : 权限认证中间件
     * 变  量 : --------------------------------------
     * 输  入 : (string) $token => '用户标识';
     * 输  出 : {"errNum":102,"retMsg":"权限不足","retData":false}
     * 创  建 : 2018/06/23 10:23
     */
    public function handle(Request $request,\Closure $next)
    {
        // 更新项目开发项目
        if(httpGetIp()!==getLocalIP())
        {
            return redirect('/v1/right_module/login_admin');
        }else{
            return $next($request);
        }
    }
}

<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

/**
 * 名  称 : returnData()
 * 功  能 : 返回函数数据
 * 变  量 : --------------------------------------
 * 输  入 : (string) $string => 'success'/'error'
 * 输  入 : ( data ) $data   => '任意数据格式内容'
 * 输  出 : [ 'msg' => 'success', 'data' => $data ]
 * 输  出 : [ 'msg' => 'error',  'data' => $data ]
 * 创  建 : 2018/06/12 21:40
 */
function returnData($string,$data = false)
{
    return [ 'msg'=>$string, 'data'=>$data ];
}

/**
 * 名  称 : returnResponse()
 * 功  能 : 返回接口响应数据
 * 变  量 : --------------------------------------
 * 输  入 : (int)    $number  => '返回状态编号';
 * 输  入 : (string) $string  => '提示信息'
 * 输  入 : (data)   $retData => '任意数据格式内容'
 * 输  出 : {"errNum":0,"retMsg":"提示信息","retData":{}
 * 输  出 : {"errNum":1,"retMsg":"提示信息","retData":false
 * 创  建 : 2018/06/12 21:40
 */
function returnResponse($number,$string,$retData = false)
{
    return json_encode([
        'errNum'  => $number,
        'retMsg'  => $string,
        'retData' => $retData
    ],JSON_UNESCAPED_UNICODE );
}

/**
 * 名  称 : userToken()
 * 功  能 : 生成Token标识字符串
 * 变  量 : --------------------------------------
 * 输  入 : --------------------------------------
 * 输  出 : 单一功能函数，只返回token字符串
 * 创  建 : 2018/06/13 15:09
 */
function userToken()
{
    $str  = 'abcdefghijklmnopqrstuvwxyz';
    $str .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $str .= '_123456789';

    $newStr = '';
    for( $i = 0; $i < 32; $i++) {
        $newStr .= $str[mt_rand(0,strlen($str)-1)];
    }
    $newStr .= time().mt_rand(100000,999999);

    return md5($newStr);
}

/**
 * 名  称 : http_get_ip()
 * 功  能 : 获取客户端IP地址信息
 * 变  量 : --------------------------------------
 * 输  入 : --------------------------------------
 * 输  出 : 单一功能函数，获取客户端IP地址信息
 * 创  建 : 2018/07/17 11:50
 */
function httpGetIp(){
    //判断服务器是否允许$_SERVER
    if(isset($_SERVER)){
        if(isset($_SERVER[HTTP_X_FORWARDED_FOR])){
            $realip = $_SERVER[HTTP_X_FORWARDED_FOR];
        }elseif(isset($_SERVER[HTTP_CLIENT_IP])) {
            $realip = $_SERVER[HTTP_CLIENT_IP];
        }else{
            $realip = $_SERVER[REMOTE_ADDR];
        }
    }else{
        //不允许就使用getenv获取
        if(getenv("HTTP_X_FORWARDED_FOR")){
            $realip = getenv( "HTTP_X_FORWARDED_FOR");
        }elseif(getenv("HTTP_CLIENT_IP")) {
            $realip = getenv("HTTP_CLIENT_IP");
        }else{
            $realip = getenv("REMOTE_ADDR");
        }
    }

    return $realip;
}

/**
 * 名  称 : getLocalIP()
 * 功  能 : 获取本机IP地址信息
 * 变  量 : --------------------------------------
 * 输  入 : --------------------------------------
 * 输  出 : 单一功能函数，获取本机IP地址信息
 * 创  建 : 2018/07/17 11:50
 */
function getLocalIP() {
    $preg = "/\A((([0-9]?[0-9])|(1[0-9]{2})|(2[0-4][0-9])|(25[0-5]))\.){3}(([0-9]?[0-9])|(1[0-9]{2})|(2[0-4][0-9])|(25[0-5]))\Z/";
//获取操作系统为win2000/xp、win7的本机IP真实地址
    exec("ipconfig", $out, $stats);
    if (!empty($out)) {
        foreach ($out AS $row) {
            if (strstr($row, "IP") && strstr($row, ":") && !strstr($row, "IPv6")) {
                $tmpIp = explode(":", $row);
                if (preg_match($preg, trim($tmpIp[1]))) {
                    return trim($tmpIp[1]);
                }
            }
        }
    }
//获取操作系统为linux类型的本机IP真实地址
    exec("ifconfig", $out, $stats);
    if (!empty($out)) {
        if (isset($out[1]) && strstr($out[1], 'addr:')) {
            $tmpArray = explode(":", $out[1]);
            $tmpIp = explode(" ", $tmpArray[1]);
            if (preg_match($preg, trim($tmpIp[0]))) {
                return trim($tmpIp[0]);
            }
        }
    }
    return '127.0.0.1';
}

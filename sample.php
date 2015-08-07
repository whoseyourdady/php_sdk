<?php

require('./include.php');
use TencentYoutuyun\Youtu;
use TencentYoutuyun\Conf;


// 设置APP 鉴权信息
$appid='';
$secretId='';
$secretKey='';
$userid='';


Conf::setAppInfo($appid, $secretId, $secretKey, $userid);


// 人脸检测 调用列子
$uploadRet = YouTu::detectface('a.jpg', 1);
var_dump($uploadRet);


// 人脸定位 调用demo
$uploadRet = YouTu::faceshape('a.jpg', 1);
var_dump($uploadRet);

?>

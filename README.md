# TencentYoutuyun-person-face-service
php sdk for [腾讯优图云人脸服务](http://open.youtu.qq.com/)

## 安装（使用composer获取或者直接下载源码集成）

### 使用composer获取
php composer.phar require TencentYoutuyun/php-sdk
调用请参考示例1

### 直接下载源码集成
从github下载源码装入到您的程序中，并加载include.php
调用请参考示例2

## 修改配置
修改TencentYoutuyun/Conf.php内的appid等信息为您的配置

## 人脸对比示例1（使用composer安装后生成的autoload）
```php
<?php

require('./vendor/autoload.php');
use TencentYoutuyun\Youtu;

//人脸对比
$uploadRet = YouTu::FaceCompare('you_path_one.jpg', 'you_path_two.jpg');
var_dump($uploadRet);
```


## 人脸对比示例2（使用TencentYoutuyun提供的include.php）
```php
<?php

require('./include.php');
use TencentYoutuyun\Youtu;

//人脸对比
$uploadRet = YouTu::FaceCompare('you_path_one.jpg', 'you_path_two.jpg');
var_dump($uploadRet);
```
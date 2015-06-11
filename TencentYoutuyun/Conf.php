<?php
namespace TencentYoutuyun;

class Conf
{
    const PKG_VERSION = '1.0.*'; 

    const API_YOUTU_END_POINT = 'http://api.youtu.qq.com/';

    const APPID = '1000061';

    const SECRET_ID = 'AKIDg73g4cCm7J2Nw68g2dJWFXH1p93TMf3bw';

    const SECRET_KEY = 'HH064Ds0zArO7qe61dyKWTSDBf3adCLh';

    public static function getUA() {
        return 'YoutuPHP/'.self::PKG_VERSION.' ('.php_uname().')';
    }
}
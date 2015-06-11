<?php

namespace TencentYoutuyun;

class YouTu
{
    // 30 days
    const EXPIRED_SECONDS = 2592000;
    const HTTP_BAD_REQUEST = 400;
    const HTTP_SERVER_ERROR = 500;

    const USER_ID=3041722595;

    public static function DetectFace($image_path) {

        $image_path = realpath($image_path);
        
        if (!file_exists($image_path))
        {
            return array('httpcode' => 0, 'code' => self::HTTP_BAD_REQUEST, 'message' => 'file '.$image_path.' not exists', 'data' => array());
        }

        $expired = time() + self::EXPIRED_SECONDS;
        $url = Conf::API_YOUTU_END_POINT . 'youtu/api/detectface';
        $sign = Auth::appSign($expired,self::USER_ID);

       $image_data = file_get_contents($image_path);
        $post_data = array(
            "app_id" =>  Conf::APPID,
            "image" =>  base64_encode($image_data)
        );

        $req = array(
            'url' => $url,
            'method' => 'post',
            'timeout' => 10,
            'data' => json_encode($post_data),
            'header' => array(
                'Authorization: '.$sign,
            ),
        );
        $rsp  = Http::send($req);
        $ret  = json_decode($rsp, true);
        return $ret;
    }

    public static function FaceCompare($image_path_a, $image_path_b) {

        $image_path_a = realpath($image_path_a);
        $image_path_b = realpath($image_path_b);
        if (!file_exists($image_path_a))
        {
            return array('httpcode' => 0, 'code' => self::HTTP_BAD_REQUEST, 'message' => 'file '.$image_path_a.' not exists', 'data' => array());
        }

        if (!file_exists($image_path_b))
        {
            return array('httpcode' => 0, 'code' => self::HTTP_BAD_REQUEST, 'message' => 'file '.$image_path_b.' not exists', 'data' => array());
        }

        $expired = time() + self::EXPIRED_SECONDS;
        $url = Conf::API_YOUTU_END_POINT . 'youtu/api/facecompare';
        $sign = Auth::appSign($expired,self::USER_ID);

        $image_data_a = file_get_contents($image_path_a);
        $image_data_b = file_get_contents($image_path_b);

        $post_data = array(
            "app_id" =>  Conf::APPID,
            "imageA" =>  base64_encode($image_data_a),
            "imageB" =>  base64_encode($image_data_b)
        );

        $req = array(
            'url' => $url,
            'method' => 'post',
            'timeout' => 10,
            'data' => json_encode($post_data),
            'header' => array(
                'Authorization: '.$sign,
            ),
        );
        $rsp  = Http::send($req);
        $ret  = json_decode($rsp, true);
        return $ret;
    }

    public static function FaceVerify($image_path,$person_id) {

        $image_path = realpath($image_path);
        
        if (!file_exists($image_path))
        {
            return array('httpcode' => 0, 'code' => self::HTTP_BAD_REQUEST, 'message' => 'file '.$image_path.' not exists', 'data' => array());
        }

        $expired = time() + self::EXPIRED_SECONDS;
        $url = Conf::API_YOUTU_END_POINT . 'youtu/api/faceverify';
        $sign = Auth::appSign($expired,self::USER_ID);

        $image_data = file_get_contents($image_path);
        $post_data = array(
            "app_id" =>  Conf::APPID,
            "image" =>  base64_encode($image_data),
            "person_id" =>$person_id,
        );

        $req = array(
            'url' => $url,
            'method' => 'post',
            'timeout' => 10,
            'data' => json_encode($post_data),
            'header' => array(
                'Authorization: '.$sign,
            ),
        );
        $rsp  = Http::send($req);
        $ret  = json_decode($rsp, true);
        return $ret;
    }

    public static function FaceIdentify($image_path,$group_id) {

        $image_path = realpath($image_path);
        
        if (!file_exists($image_path))
        {
            return array('httpcode' => 0, 'code' => self::HTTP_BAD_REQUEST, 'message' => 'file '.$image_path.' not exists', 'data' => array());
        }

        $expired = time() + self::EXPIRED_SECONDS;
        $url = Conf::API_YOUTU_END_POINT . 'youtu/api/faceidentify';
        $sign = Auth::appSign($expired,self::USER_ID);

        $image_data = file_get_contents($image_path);
        $post_data = array(
            "app_id" =>  Conf::APPID,
            "image" =>  base64_encode($image_data),
            "group_id" =>$group_id,
        );

        $req = array(
            'url' => $url,
            'method' => 'post',
            'timeout' => 10,
            'data' => json_encode($post_data),
            'header' => array(
                'Authorization: '.$sign,
            ),
        );
        $rsp  = Http::send($req);
        $ret  = json_decode($rsp, true);
        return $ret;
    }

    public static function newperson($image_path, $person_id,array $group_ids) {
        $image_path = realpath($image_path);
        if (!file_exists($image_path))
        {
            return array('httpcode' => 0, 'code' => self::HTTP_BAD_REQUEST, 'message' => 'file '.$image_path.' not exists', 'data' => array());
        }

        $expired = time() + self::EXPIRED_SECONDS;
        $url = Conf::API_YOUTU_END_POINT . 'youtu/api/newperson';
        $sign = Auth::appSign($expired,self::USER_ID);

        $image_data = file_get_contents($image_path);
        $post_data = array(
            "app_id" =>  Conf::APPID,
            "image" =>  base64_encode($image_data),
            "person_id" =>$person_id,
            "group_ids" =>$group_ids
        );

        $req = array(
            'url' => $url,
            'method' => 'post',
            'timeout' => 10,
            'data' => json_encode($post_data),
            'header' => array(
                'Authorization: '.$sign,
            ),
        );
        $rsp  = Http::send($req);
        $ret  = json_decode($rsp, true);
        return $ret;
    }

    public static function DelPerson($person_id) {

        $expired = time() + self::EXPIRED_SECONDS;
        $url = Conf::API_YOUTU_END_POINT . 'youtu/api/delperson';
        $sign = Auth::appSign($expired,self::USER_ID);

        $post_data = array(
            "app_id" =>  Conf::APPID,
            "person_id" =>$person_id,
        );

        $req = array(
            'url' => $url,
            'method' => 'post',
            'timeout' => 10,
            'data' => json_encode($post_data),
            'header' => array(
                'Authorization: '.$sign,
            ),
        );
        $rsp  = Http::send($req);
        $ret  = json_decode($rsp, true);
        return $ret;
    }

    public static function AddFace($person_id,array $image_path_arr) {
        $image_data_arr=array();
        foreach($image_path_arr as $one_path){
            if (!file_exists($one_path))
            {
                return array('httpcode' => 0, 'code' => self::HTTP_BAD_REQUEST, 'message' => 'file '.$one_path.' not exists', 'data' => array());
            }
            $image_data=file_get_contents($one_path);
            array_push($image_data_arr,base64_encode($image_data));
        }
        $expired = time() + self::EXPIRED_SECONDS;
        $url = Conf::API_YOUTU_END_POINT . 'youtu/api/addface';
        $sign = Auth::appSign($expired,self::USER_ID);

        $post_data = array(
            "app_id" =>  Conf::APPID,
            "images" =>  $image_data_arr,
            "person_id" =>$person_id,
        );

        $req = array(
            'url' => $url,
            'method' => 'post',
            'timeout' => 10,
            'data' => json_encode($post_data),
            'header' => array(
                'Authorization: '.$sign,
            ),
        );
        $rsp  = Http::send($req);
        $ret  = json_decode($rsp, true);
        return $ret;
    }

    public static function DelFace($person_id,array $face_id_arr) {

        $expired = time() + self::EXPIRED_SECONDS;
        $url = Conf::API_YOUTU_END_POINT . 'youtu/api/delface';
        $sign = Auth::appSign($expired,self::USER_ID);

        $post_data = array(
            "app_id" =>  Conf::APPID,
            "face_ids" => $face_id_arr,
            "person_id" =>$person_id,
        );

        $req = array(
            'url' => $url,
            'method' => 'post',
            'timeout' => 10,
            'data' => json_encode($post_data),
            'header' => array(
                'Authorization: '.$sign,
            ),
        );
        $rsp  = Http::send($req);
        $ret  = json_decode($rsp, true);
        return $ret;
    }

    public static function SetInfo($person_name,$person_id) {

        $expired = time() + self::EXPIRED_SECONDS;
        $url = Conf::API_YOUTU_END_POINT . 'youtu/api/setinfo';
        $sign = Auth::appSign($expired,self::USER_ID);

        $post_data = array(
            "app_id" =>  Conf::APPID,
            "person_name" =>  $person_name,
            "person_id" =>$person_id,
        );

        $req = array(
            'url' => $url,
            'method' => 'post',
            'timeout' => 10,
            'data' => json_encode($post_data),
            'header' => array(
                'Authorization: '.$sign,
            ),
        );
        $rsp  = Http::send($req);
        $ret  = json_decode($rsp, true);
        return $ret;
    }

    public static function GetInfo($person_id) {

        $expired = time() + self::EXPIRED_SECONDS;
        $url = Conf::API_YOUTU_END_POINT . 'youtu/api/getinfo';
        $sign = Auth::appSign($expired,self::USER_ID);

        $post_data = array(
            "app_id" =>  Conf::APPID,
            "person_id" =>$person_id,
        );

        $req = array(
            'url' => $url,
            'method' => 'post',
            'timeout' => 10,
            'data' => json_encode($post_data),
            'header' => array(
                'Authorization: '.$sign,
            ),
        );
        $rsp  = Http::send($req);
        $ret  = json_decode($rsp, true);
        return $ret;
    }

    public static function GetGroupIds() {

        $expired = time() + self::EXPIRED_SECONDS;
        $url = Conf::API_YOUTU_END_POINT . 'youtu/api/getgroupids';
        $sign = Auth::appSign($expired,self::USER_ID);

        $post_data = array(
            "app_id" =>  Conf::APPID
        );

        $req = array(
            'url' => $url,
            'method' => 'post',
            'timeout' => 10,
            'data' => json_encode($post_data),
            'header' => array(
                'Authorization: '.$sign,
            ),
        );
        $rsp  = Http::send($req);
        $ret  = json_decode($rsp, true);
        return $ret;
    }

    public static function GetPersonIds($group_id) {

        $expired = time() + self::EXPIRED_SECONDS;
        $url = Conf::API_YOUTU_END_POINT . 'youtu/api/getpersonids';
        $sign = Auth::appSign($expired,self::USER_ID);

        $post_data = array(
            "app_id" =>  Conf::APPID,
            "group_id" =>$group_id,
        );

        $req = array(
            'url' => $url,
            'method' => 'post',
            'timeout' => 10,
            'data' => json_encode($post_data),
            'header' => array(
                'Authorization: '.$sign,
            ),
        );
        $rsp  = Http::send($req);
        $ret  = json_decode($rsp, true);
        return $ret;
    }

    public static function GetFaceIds($person_id) {

        $expired = time() + self::EXPIRED_SECONDS;
        $url = Conf::API_YOUTU_END_POINT . 'youtu/api/getfaceids';
        $sign = Auth::appSign($expired,self::USER_ID);

        $post_data = array(
            "app_id" =>  Conf::APPID,
            "person_id" =>$person_id,
        );

        $req = array(
            'url' => $url,
            'method' => 'post',
            'timeout' => 10,
            'data' => json_encode($post_data),
            'header' => array(
                'Authorization: '.$sign,
            ),
        );
        $rsp  = Http::send($req);
        $ret  = json_decode($rsp, true);
        return $ret;
    }

    public static function GetFaceInfo($face_id) {

        $expired = time() + self::EXPIRED_SECONDS;
        $url = Conf::API_YOUTU_END_POINT . 'youtu/api/getfaceinfo';
        $sign = Auth::appSign($expired,self::USER_ID);

        $post_data = array(
            "app_id" =>  Conf::APPID,
            "face_id" =>$face_id,
        );

        $req = array(
            'url' => $url,
            'method' => 'post',
            'timeout' => 10,
            'data' => json_encode($post_data),
            'header' => array(
                'Authorization: '.$sign,
            ),
        );
        $rsp  = Http::send($req);
        $ret  = json_decode($rsp, true);
        return $ret;
    }
}



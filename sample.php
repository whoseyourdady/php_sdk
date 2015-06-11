<?php

require('./include.php');
use TencentYoutuyun\Youtu;

#$uploadRet = YouTu::DetectFace('you_path.jpg');
#$uploadRet = YouTu::NewPerson('you_path.jpg','123456',array('test_groupid','test_groupid2','test_groupid3'));
#$uploadRet = YouTu::FaceVerify('you_path.jpg','123456');
#$uploadRet = YouTu::FaceIdentify('you_path.jpg','test_groupid');
#$uploadRet = YouTu::NewPerson('you_path.jpg','123456',array('test_groupid','test_groupid2','test_groupid3'));
#$uploadRet = YouTu::DelPerson('123456');
#$uploadRet = YouTu::AddFace('123456',array('you_path.jpg'));
#$uploadRet = YouTu::DelFace('123456',array('1027423607359340543'));
#$uploadRet = YouTu::SetInfo('name_groupid','123456');
#$uploadRet = YouTu::GetInfo('123456');
#$uploadRet = YouTu::GetGroupIds();
#$uploadRet = YouTu::GetPersonIds('test_groupid');
#$uploadRet = YouTu::GetFaceIds('123456');
#$uploadRet = YouTu::GetFaceInfo('1027425345818656767');
$uploadRet = YouTu::FaceCompare('you_path_one.jpg', 'you_path_two.jpg');

var_dump($uploadRet);
?>
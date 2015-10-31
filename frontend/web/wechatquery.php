<?php


//define your token
require 'WechatCallbackapiTest.php';
        $wechatObj = new WechatCallbackapiTest();
//$wechatObj->valid();
$uid=$_GET['uid'];




$link = @new mysqli('rds26izw8p54t86315s7.mysql.rds.aliyuncs.com;dbname=vcards', 'vcards', 'gg770880', 'vcards' //$db['port']
);
$error=$link->connect_error;//不可用error属性！

if($error) {
        //   $error = mysqli_error($link);
        if (strpos($error, 'Access denied for user') == 0) {//!==false
                //strpos(),返回值int,返回字符串在另一字符串中第一次出现的位置，如果没有找到字符串则返回 FALSE。
                $error = '您数据库的访问用户名或密码错误. <br />';

        }else{$error = iconv('gbk', 'utf8', $error);}
        $myMsg=$error;
        $wechatObj->responseMsg($myMsg);

}

if($error==null) {
        $codeTable='tbhome_anti_code_'.$uid;
        $code='8702359416';
        $sql="select * from ".$codeTable." where code='".$code."'";
        $result=$link->query($sql);
        if(!$result){
                $myMsg='防伪码不存在！请谨防假冒！';
        }else{
        $prize=$result->prize;
        $myMsg='卡接口成功！奖品：'$prize;
                }
        $wechatObj->responseMsg($myMsg);

}



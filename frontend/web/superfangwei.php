<?php
/**
 * 超强防伪码模块处理程序
 *
 * @author 超强防伪码
 * @url http://bbs.weihezi.cc/
 */
defined('IN_IA') or exit('Access Denied');

class Super_securitycodeModuleProcessor extends WeModuleProcessor {
    public function __construct(){
        global $_W;
        $this->data = 'super_securitycode_data_'.$_W['uniacid'];
        $this->moban = 'super_securitycode_data_moban';
        $this->reply = 'super_securitycode_reply';
        $sql = "CREATE TABLE IF NOT EXISTS ".tablename($this->data)." LIKE ".tablename($this->moban);
        pdo_query($sql);
    }





    public function respond() {
        global $_W;
        load()->model('mc');
        $openid = $this->message['from'];
        $logs['openid'] = $openid;
        $logs['weid'] = $_W['uniacid'];
        $fans = pdo_fetch("SELECT fanid,uid FROM ". tablename('mc_mapping_fans') ." WHERE `openid`='$openid' LIMIT 1");
        $uid = '0';
        if ($fans['uid'] != '0') {
            $uid = $fans['uid'];
        }else{
            $uid = mc_update($uid, array('email' => md5($_W['openid']).'@we7.cc'));
            if (!empty($fans['fanid']) && !empty($uid)) {
                pdo_update('mc_mapping_fans', array('uid' => $uid), array('fanid' => $fans['fanid']));
            }
        }
        $rid = $this->rule;
        $sql = "SELECT * FROM " . tablename('rule_keyword') . " WHERE `rid`=:rid LIMIT 1";
        $row = pdo_fetch($sql, array(':rid' => $rid));
        $sqls = "SELECT * FROM " . tablename($this->reply) . " WHERE `rid`=:rid LIMIT 1";
        $rows = pdo_fetch($sqls, array(':rid' => $rid));

        if (empty($rows['id'])) {
            return array();
        }
        if (empty($row['id'])) {
            return array();
        }


        $link = @new mysqli('rds26izw8p54t86315s7.mysql.rds.aliyuncs.com', 'vcards', 'gg770880', 'vcards'//$db['port']
        );
        $error=$link->connect_error;//不可用error属性！

        if($error) {
            //   $error = mysqli_error($link);
            if (strpos($error, 'Access denied for user') == 0) {//!==false
                //strpos(),返回值int,返回字符串在另一字符串中第一次出现的位置，如果没有找到字符串则返回 FALSE。
                $error = '您数据库的访问用户名或密码错误. <br />';

            }else{
                $error = iconv('gbk', 'utf8', $error);
            }
            $myMsg=$error;

        }

        if($error==null) {
            $wd_code = $this->message['scancodeinfo']['scanresult'];
        //    $wd_qrcode = substr($wd_code, strpos($wd_code, "wd_code=")+8   );
            $codeStart=strpos($wd_code,'code=')+5;
            $code=substr($wd_code,$codeStart);
            $codeEnd=strpos($code, '&');
            $codeLength=$codeEnd-$codeStart;
          //  $wd_qrcode=substr($wd_code, $codeStart, $codeLength);
            $wd_qrcode=$code;
            if( $this->message['event'] == 'scancode_waitmsg' ){
                $qrtype = $this->message['scancodeinfo']['scantype'];
                $SecurityCode = $wd_qrcode;
            }else{
                $keywords = $wd_qrcode;  // 取得正则表达式
                //查询防伪码
                preg_match('/'.$keywords.'(.*)/', $this->message['content'], $match);
                $SecurityCode = $match[1];
            }

            $uid=4;
            $codeTable='tbhome_anti_code_'.$uid;
    //        $code='8702359416';
            $sql="select * from ".$codeTable." where code='".$SecurityCode."'";
            $result=$link->query($sql);
            if(!$result){
                $myMsg='防伪码不存在！请谨防假冒！';
            }else{
                $row = $result->fetch_assoc();
                $replyid=$row['replyid'];
                $productid=$row['productid'];
                $productSql="select * from tbhome_product where id=".$productid;
                $product=$link->query($productSql)->fetch_assoc();
                $replySql="select * from tbhome_anti_reply where id=".$replyid;
                $antireply=$link->query($replySql)->fetch_assoc();
                $replySuccess=$antireply['success'];

                $clicks=intval($row['clicks'])+1;
                $query_time=time();

                $sqlUpdate="UPDATE ".$codeTable." SET clicks=".$clicks." query_time=".$query_time." WHERE code='".$securityCode."'";
                $link->query($sqlUpdate);


                $query_time=date('Y年m月d日 H:m:s', $row['query_time']);
                $replySuccess=str_replace([
                    '[Code]', '[Clicks]', '[Factory]', '[Product]', '[Brand]', '[Spec]', '[Prize]', '[Time]', '[Price]',
                ], [
                    $row['code'], $row['clicks'], $product['factory'], $product['name'], $product['brand'], $product['specification'], $row['prize'], $query_time, $product['price'],
                ], $replySuccess);

                $myMsg=$replySuccess;
                }
    //        $wechatObj->responseMsg($myMsg);

        }
        return $this->respText($myMsg);

/*
        $logs['code'] = $SecurityCode;
        $sql = "SELECT * FROM ".tablename($this->data)." WHERE code='{$SecurityCode}' LIMIT 1";
        $member = pdo_fetch($sql);
        $states = 0;
        if(!empty($member)){
            if ($member['status'] == '0') {
                $states = 0;
            }elseif($member['num'] >=$rows['tnumber']){
                $set = pdo_update($this->data,array('status' => '0') ,array('id' => $member['id']));
                $states = 0;
            }else{
                $data = array(
                    'num' => $member['num'] + 1,
                );
                pdo_update($this->data, $data, array('id' => $member['id']));
                $states = 1;
            }
            if($states ==0){
                $reply = str_replace('[SecurityCode]',$SecurityCode,$rows['Failure']);
            }else{
                $number = $member['num'] + 1;
                $Factory = $member['factory'];
                $Effedate = date('Y-m-d', $member['stime']);
                $Products = $member['type'];
                //替换变量
                $reply = str_replace('[number]',$number,$rows['Reply']);
                $reply = str_replace('[Factory]',$Factory,$reply);
                $reply = str_replace('[Effedate]',$Effedate,$reply);
                $reply = str_replace('[Products]',$Products,$reply);
                $reply = str_replace('[SecurityCode]',$SecurityCode,$reply);
                $reply = str_replace('[CreditName]',$member['creditname'],$reply);
                $reply = str_replace('[CreditNum]',$member['creditnum'],$reply);
                if ($member['creditstatus'] == '0') {
                    mc_credit_update($uid,'credit1',$member['creditnum'],array('1','防伪码自动增加积分，积分名称：'.$member['creditname']));
                    pdo_update($this->data,array('creditstatus'=>'1'),array('id'=>$member['id']));
                }
                $logs['status'] = '1';
            }
        }else{
            $logs['status'] = '0';
            $reply = '您查询的防伪码不存在，请核对后重试！';
        }
        $logs['createtime'] = time();
        pdo_insert('super_securitycode_logs',$logs);

*/


    }



}





































<?php
/**
 * 超强防伪码模块处理程序
 *
 * @author 超强防伪码
 * @url http://bbs.weihezi.cc/
 */
defined('IN_IA') or exit('Access Denied');

class Super_securitycodeModuleProcessor extends WeModuleProcessor {
    public function __construct(){
        global $_W;
        $this->data = 'super_securitycode_data_'.$_W['uniacid'];
        $this->moban = 'super_securitycode_data_moban';
        $this->reply = 'super_securitycode_reply';
        $sql = "CREATE TABLE IF NOT EXISTS ".tablename($this->data)." LIKE ".tablename($this->moban);
        pdo_query($sql);
    }





    public function respond() {
        global $_W;
        load()->model('mc');
        $openid = $this->message['from'];
        $logs['openid'] = $openid;
        $logs['weid'] = $_W['uniacid'];
        $fans = pdo_fetch("SELECT fanid,uid FROM ". tablename('mc_mapping_fans') ." WHERE `openid`='$openid' LIMIT 1");
        $uid = '0';
        if ($fans['uid'] != '0') {
            $uid = $fans['uid'];
        }else{
            $uid = mc_update($uid, array('email' => md5($_W['openid']).'@we7.cc'));
            if (!empty($fans['fanid']) && !empty($uid)) {
                pdo_update('mc_mapping_fans', array('uid' => $uid), array('fanid' => $fans['fanid']));
            }
        }
        $rid = $this->rule;
        $sql = "SELECT * FROM " . tablename('rule_keyword') . " WHERE `rid`=:rid LIMIT 1";
        $row = pdo_fetch($sql, array(':rid' => $rid));
        $sqls = "SELECT * FROM " . tablename($this->reply) . " WHERE `rid`=:rid LIMIT 1";
        $rows = pdo_fetch($sqls, array(':rid' => $rid));

        if (empty($rows['id'])) {
            return array();
        }
        if (empty($row['id'])) {
            return array();
        }


        $link = @new mysqli('rds26izw8p54t86315s7.mysql.rds.aliyuncs.com', 'vcards', 'gg770880', 'vcards'//$db['port']
        );
        $error=$link->connect_error;//不可用error属性！

        if($error) {
            //   $error = mysqli_error($link);
            if (strpos($error, 'Access denied for user') == 0) {//!==false
                //strpos(),返回值int,返回字符串在另一字符串中第一次出现的位置，如果没有找到字符串则返回 FALSE。
                $error = '您数据库的访问用户名或密码错误. <br />';

            }else{
                $error = iconv('gbk', 'utf8', $error);
            }
            $myMsg=$error;

        }

        if($error==null) {
            $wd_code = $this->message['scancodeinfo']['scanresult'];
            //    $wd_qrcode = substr($wd_code, strpos($wd_code, "wd_code=")+8   );
            $codeStart=strpos($wd_code,'code=')+5;
            $code=substr($wd_code,$codeStart);
            $wd_qrcode=$code;
            $codeEnd=strpos($code, '&');
            //  $codeLength=$codeEnd-$codeStart;
            //  $wd_qrcode=substr($wd_code, $codeStart, $codeLength);
            if( $this->message['event'] == 'scancode_waitmsg' ){
                $qrtype = $this->message['scancodeinfo']['scantype'];
                $SecurityCode = $wd_qrcode;
            }else{
                $keywords = $wd_qrcode;  // 取得正则表达式
                //查询防伪码
                preg_match('/'.$keywords.'(.*)/', $this->message['content'], $match);
                $SecurityCode = $match[1];
            }

            $uid=4;
            $codeTable='tbhome_anti_code_'.$uid;
            //        $code='8702359416';
            $sql="select * from ".$codeTable." where code='".$SecurityCode."'";
            $result=$link->query($sql);
            if(!$result){
                $myMsg='防伪码不存在！请谨防假冒！';
            }else{
                $row = $result->fetch_assoc();
                $replyid=$row['replyid'];
                $productid=$row['productid'];
                $productSql="select * from tbhome_product where id=".$productid;
                $product=$link->query($productSql)->fetch_assoc();
                $replySql="select * from tbhome_anti_reply where id=".$replyid;
                $antireply=$link->query($replySql)->fetch_assoc();
                $replySuccess=$antireply['success'];
                $sqlUpdate="UPDATE ".$codeTable." SET clicks=".($row['clicks']+1)." query_time=".time()." WHERE code='".$securityCode."'";
                $link->query($sqlUpdate);


                $query_time=date('Y年m月d日 H:m:s', $row['query_time']);
                $replySuccess=str_replace([
                    '[Code]', '[Clicks]', '[Factory]', '[Product]', '[Brand]', '[Spec]', '[Prize]', '[Time]', '[Price]',
                ], [
                    $row['code'], $row['clicks'], $product['factory'], $product['name'], $product['brand'], $product['specification'], $row['prize'], $query_time, $product['price'],
                ], $replySuccess);

                $myMsg=$replySuccess;
            }
            //        $wechatObj->responseMsg($myMsg);

        }
        return $this->respText($myMsg);

        /*
                $logs['code'] = $SecurityCode;
                $sql = "SELECT * FROM ".tablename($this->data)." WHERE code='{$SecurityCode}' LIMIT 1";
                $member = pdo_fetch($sql);
                $states = 0;
                if(!empty($member)){
                    if ($member['status'] == '0') {
                        $states = 0;
                    }elseif($member['num'] >=$rows['tnumber']){
                        $set = pdo_update($this->data,array('status' => '0') ,array('id' => $member['id']));
                        $states = 0;
                    }else{
                        $data = array(
                            'num' => $member['num'] + 1,
                        );
                        pdo_update($this->data, $data, array('id' => $member['id']));
                        $states = 1;
                    }
                    if($states ==0){
                        $reply = str_replace('[SecurityCode]',$SecurityCode,$rows['Failure']);
                    }else{
                        $number = $member['num'] + 1;
                        $Factory = $member['factory'];
                        $Effedate = date('Y-m-d', $member['stime']);
                        $Products = $member['type'];
                        //替换变量
                        $reply = str_replace('[number]',$number,$rows['Reply']);
                        $reply = str_replace('[Factory]',$Factory,$reply);
                        $reply = str_replace('[Effedate]',$Effedate,$reply);
                        $reply = str_replace('[Products]',$Products,$reply);
                        $reply = str_replace('[SecurityCode]',$SecurityCode,$reply);
                        $reply = str_replace('[CreditName]',$member['creditname'],$reply);
                        $reply = str_replace('[CreditNum]',$member['creditnum'],$reply);
                        if ($member['creditstatus'] == '0') {
                            mc_credit_update($uid,'credit1',$member['creditnum'],array('1','防伪码自动增加积分，积分名称：'.$member['creditname']));
                            pdo_update($this->data,array('creditstatus'=>'1'),array('id'=>$member['id']));
                        }
                        $logs['status'] = '1';
                    }
                }else{
                    $logs['status'] = '0';
                    $reply = '您查询的防伪码不存在，请核对后重试！';
                }
                $logs['createtime'] = time();
                pdo_insert('super_securitycode_logs',$logs);

        */


    }



}
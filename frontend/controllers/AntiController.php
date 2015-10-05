<?php
namespace frontend\controllers;
use Yii;
use common\models\User;
use frontend\models\Info;
use frontend\models\AntiReply;
use frontend\models\AntiSetting;
use frontend\models\AntiCode;

class AntiController extends \yii\web\Controller
{
    public function actionIndex($uid=1)
    {
      //  $antireply=new AntiReply();
        $antisetting=new AntiSetting();
        $setting=AntiSetting::findOne($uid);
     //   $info = Info::findOne(['uid'=>$uid]);

//        $model=$antireply->findOne($uid);


 //       return $this->renderPartial(
        return $this->renderPartial(
            //'_form_antireply',
            'index',
           ['setting'=>$setting]
        );
    }


    public function actionAntiquery(){



        header('Content-Type:text/html;charset=UTF-8');

        echo 'OK!';
        /*接收POST数据*/
        $FWcode=$_POST['FWcode'];//echo $FWcode; 只能传递数字类型的数据
        $FWuid=$_POST['FWuid'];
        var_dump($FWcode);


//		echo $FWcode;//$_POST['FWcode'];
//		var_dump($FWcode);

        /*建立数据表模型*/
        $code=AntiCode::findOne(['code'=>$FWcode]);


        /*视图输出控制器 */
//if (!isset($FWcode)){echo '请输入10位纯数字的编码。';}
//     if($data &&($data1['fwuid']==$FWuid)) {

        if($code) {
            //     $Form1->where($condition)->setInc('used',1); // 查询次数加1
            //     $Form1->where($condition)->setField('time', time());//获取查询时间戳

            echo '<div class="alert alert-success" >';
            echo '恭喜！是正品！';

//	   echo '<br/>编码 ：'.$data['fwcode'];
            /*
                   if ($data['money']>0){
                   echo '<br/>摇奖抽中：<br/><strong>'.$data['money'].'</strong> 元！';
                   }

                          if ($data['prize']){
                   echo '<br/>摇奖抽中：<br/><strong>'.$data['prize'].'</strong> ';
                   }

            */

            echo '<div class="alert-warning">';
            /*POS机的机器码*/
            echo isset($data['mcode']) ? '<br/>对应机器编码：'.$data['mcode'] : '';
            /*雄盛机械产品属性*/
            echo isset($data['product']) ? '<br/>产品名称：'.$data['product'] : '';
            echo isset($data['type']) ? '<br/>处理工艺：'.$data['type'] : '';
            echo isset($data['size']) ? '<br/>规格：'.$data['size'] : '';
            echo '</div>';

            /*输出查询次数和时间/
            //  echo $data['time']>0 ? '<br/>上次查询时间：'.date('Y年m月d日 H:i:s',$data['time']) : '<br/>现为首次查询。';
            if ($data['time']>0&&$data['used']>0){
                echo '<br/>该编码此前被查询过： '.$data['used'].' 次！';
                echo '<br/>上次查询时间：<br/>';
                echo date('Y年m月d日 H:i:s',$data['time']);
            }
            elseif($data['time']==0&&$data['used']==0){
                echo '<br/>现为首次查询。';
            }//else{echo ''; }


            if (strlen($data['imgurl'])>=5) {
                echo '<br/><img src='.$data['imgurl'].' />';
            }//输出图片

            echo '<br/><br>提示：<br/>每个产品具有唯一编码，谨防假冒！';
            //   echo '<br/>当前时间：'.date('Y年m月d日 H:i:s',time());
           */ echo '</div>';

        }

        else{
            echo '<div class="alert alert-danger" >';
            echo '谨防假冒！！';//'您所查询的编码不存在！请谨防假冒！';
            echo '</div>';
        }

    }

}

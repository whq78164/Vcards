<?php
namespace frontend\controllers;
use frontend\models\Product;
use Yii;
use common\models\User;
//use frontend\models\Info;
use frontend\models\AntiReply;
//use frontend\models\AntiSetting;
use frontend\models\AntiCode;
//use frontend\models\AntiCodetable;
//use frontend\models\AntiCodenew;
use yii\helpers\ArrayHelper;
use yii\db\Query;

class AntiController extends \yii\web\Controller
{

    public function beforeAction($action)
    {


        if (parent::beforeAction($action)) {
            $Connection = \Yii::$app->db;
            $data = '`tbhome_anti_code_'.\Yii::$app->user->id.'`';
    //        $this->table=$data;
            $moban = '`tbhome_anti_code`';
            $sql = 'CREATE TABLE IF NOT EXISTS '.$data.' LIKE '.$moban;
            $command=$Connection->createCommand($sql);
            $command->execute();
            if ($this->enableCsrfValidation && Yii::$app->getErrorHandler()->exception === null && !Yii::$app->getRequest()->validateCsrfToken()) {
                throw new BadRequestHttpException(Yii::t('yii', 'Unable to verify your data submission.'));
            }
            return true;
        }

        return false;
    }

    public $layout='user';
//    public $data;


    public function actionIndex($replyid=1)
    {
        $antireply=new AntiReply();
        $antireply=$antireply::findOne($replyid);
        if (!$antireply || $antireply==null) {$antireply= new AntiReply();};

        return $this->renderPartial(
            'index',
           ['antireply'=>$antireply,'replyid'=>$replyid,]
        );

    }

    public function random($length, $type = NULL, $special = FALSE){
        $str = "";
        switch ($type) {
            case 1:
                $str = "0123456789";
                break;
            case 2:
                $str = "abcdefghijklmnopqrstuvwxyz";
                break;
            case 3:
                $str = "abcdefghijklmnopqrstuvwxyz0123456789";
                break;
            default:
                $str = "abcdefghijklmnopqrstuvwxyz0123456789";
                break;
        }
        return substr(str_shuffle(($special != FALSE) ? '!@#$%^&*()_+' . $str : $str), 0, $length);
    }

    public function actionGencode()
    {
        $uid=Yii::$app->user->id;
        $product=Product::find()->where(['uid'=>$uid])->all();
        $listData=ArrayHelper::map($product, 'id', 'name');
        $reply=AntiReply::find()->where(['uid'=>$uid])->all();
        $listReply=ArrayHelper::map($reply, 'id', 'tag');
        $model = new AntiCode();

        return $this->render('_form_gencode', [
            'model' => $model,
            'listData'=>$listData,
            'listReply'=>$listReply,

        ]);
    }


    public function actionAntipage($code='798904845', $replyid=1, $productid=1 )
    {
        $connection=Yii::$app->db;
        $reply=AntiReply::findOne($replyid);
        $uid=$reply->uid;
        $table='tbhome_anti_code_'.$uid;
  //      $sql='SELECT * FROM '.$table.' WHERE code="'.$code.'"';
        $sql="SELECT * FROM ".$table." WHERE code='".$code."'";
        $command = $connection->createCommand($sql);
        $codeData=$command->queryOne();//返回数组，表anti_code_uid

  //   var_dump($codeData);
        if (!$codeData){
            $reply=AntiReply::findOne($replyid);
            $product=Product::findOne($productid);

            return $this->renderPartial(
                'antipage',
                [
                    'antireply'=>$reply,
                    'queryResult'=>$reply->fail,
                    'product'=>$product,
                    'colour'=>'danger',
                ]
            );

        }else{
            $replyid=$codeData['replyid'];
            $productid=$codeData['productid'];
            $reply=AntiReply::findOne($replyid);
            $product=Product::findOne($productid);
     //       var_dump($reply);
    //        var_dump($product);
            $clicks=intval($codeData['clicks'])+1;
            Yii::$app->db->createCommand()->update($table, ['clicks' => $clicks, 'query_time'=>time()], "code ='".$code."'")->execute();


                         $reply->success=str_replace([
                           '[Code]', '[Clicks]', '[Prize]', '[Time]', '[Factory]', '[Product]', '[Brand]', '[Spec]', '[Price]',
                       ], [
                             $codeData['code'], $codeData['clicks'], $codeData['prize'], date('Y年m月d日 H:i:s', $codeData['query_time']), $product->factory, $product->name, $product->brand, $product->specification, $product->price,
                       ], $reply->success);


            return $this->renderPartial(
                'antipage',
                [
                    'antireply'=>$reply,
                    'queryResult'=>$reply->success,
                    'product'=>$product,
                    'colour'=>'success',
                ]
            );

        }




    }




    public function actionPostgencode()
    {
        $Connection = \Yii::$app->db;
        $table='tbhome_anti_code_'.Yii::$app->user->id;
//        $column='code';
  //      $presql="SELECT COUNT($column) from {{$table}}"." where code like '{$_POST['sStr']}%'";
    //    $result=$Connection->createCommand($presql)->queryScalar();
//        if (!empty($result)) {
  //         echo $result;
    //        exit;
      //  }

        //     $i=1;
            //    while($i<=intval($_POST['sNum'])){
 /*              for ($i=1; $i<=intval($_POST['sNum']); $i++){
                    $model = new AntiCode();
                    if ($model->load(Yii::$app->request->post())) {
                        if ($model->validate()) {
                    $code = $this->random(intval($_POST['slen']),$_POST['rule'],false);
                            $Connection = \Yii::$app->db;
                            $result=$Connection->createCommand()->insert($table, [
                               'uid'=>Yii::$app->user->id,
                                'code'=>$_POST['sStr'].$code,
                                'productid'=>intval($model->productid),
                                'replyid'=>intval($model->replyid),
                                'prize'=>$model->prize,
                                'query_time'=>0,
                                'create_time'=>time(),
                                'clicks'=>0,
                                'status'=>10,
                            ])->execute();
                            if (!$result){echo '数据插入失败！';}
                            //$i++;
                        }else{echo '数据无效';}
                    }
                }

*/
        $model = new AntiCode();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                for ($i=0; $i<=(intval($_POST['sNum'])-1); $i++) {
                    $code = $this->random(intval($_POST['slen']), $_POST['rule'], false);
                    $tableColumn[$i]=[Yii::$app->user->id, $_POST['sStr'].$code, intval($model->productid), intval($model->replyid), $model->prize, time(), 0, 0, 10,];
                }


                $result=$Connection->createCommand()->batchInsert($table, ['uid', 'code', 'productid', 'replyid', 'prize', 'create_time', 'query_time', 'clicks', 'status'], $tableColumn)->execute();
                if (!$result){echo '数据插入失败！';}
                //$i++;
            }else{echo '数据无效';}
        }


        $successMsg='成功生成'.$_POST['sNum'].'条数据！';
        Yii::$app->getSession()->setFlash('success', $successMsg);
        return $this->redirect(['anti/gencode']);

    }

    public function actionCheckstr(){
        header('Content-Type:text/html;charset=UTF-8');
        $uid=Yii::$app->user->id;
        $sStr = $_POST['sStr'];
        $connection=Yii::$app->db;
        $table='tbhome_anti_code_'.$uid;
        $sql = "SELECT COUNT(*) FROM ".$table." where code LIKE '".$sStr."%'";
        $command = $connection->createCommand($sql);
        $rows=$command->queryScalar();
        //var_dump($rows);
echo $rows;


//        if (!empty($list)) {
  //          echo count($list);
    //    }else{
      //      echo '0';
      //  }



    }




    public function actionAntiquery()
    {
        header('Content-Type:text/html;charset=UTF-8');

        $securityCode=$_POST['FWcode'];//echo $FWcode; 只能传递数字类型的数据
        $uid=intval($_POST['FWuid']);
        $replyid = intval($_POST['replyid']);//回复语
        $table='tbhome_anti_code_'.$uid;

        $connection=Yii::$app->db;
        $sql='SELECT * FROM '.$table.' WHERE code="'.$securityCode.'"';
        $command = $connection->createCommand($sql);
        $queryone=$command->queryOne();//返回数组，表anti_code_uid

  //      $query0 = new Query();
  //      $queryone = $query0->from($table)->where(['code' => $securityCode ])->one();

        $reply=AntiReply::findOne($replyid);
        $replySuccess=$reply->success;
        $replyFail=$reply->fail;

        if ($queryone==null){//==false
            echo '<div class="alert alert-danger" >';
            echo $replyFail;//'谨防假冒！！';//'您所查询的编码不存在！请谨防假冒！';
            echo '</div>';
            var_dump($queryone);
        }
        if($queryone) {
            $clicks=intval($queryone['clicks'])+1;
       Yii::$app->db->createCommand()->update($table, ['clicks' => $clicks, 'query_time'=>time()], "code ='".$securityCode."'")->execute();
      //     $sqlclick='UPDATE '.$table.'SET click='.$clicks.' WHERE code="'.$securityCode.'"';
      //      var_dump(Yii::$app->db->createCommand($sqlclick)->execute());

            $productid=intval($queryone['productid']);
            $product=Product::findOne($productid);
            $replySuccess=str_replace([
                '[Code]', '[Clicks]', '[Factory]', '[Product]', '[Brand]', '[Spec]', '[Prize]', '[Time]', '[Price]',
            ], [
                $queryone['code'], $queryone['clicks'], $product->factory, $product->name, $product->brand, $product->specification, $queryone['prize'], date('Y年m月d日 H:i:s', $queryone['query_time']), $product->price,
            ], $replySuccess);

            echo '<div class="alert alert-success" >';
            //     echo '恭喜！是正品！';


            echo $replySuccess;//'<br/>编码 ：'.$queryone['code'].$queryone['type'];

        }

    }


}

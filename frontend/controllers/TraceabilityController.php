<?php

namespace frontend\controllers;
use frontend\models\TraceabilityData;
use Yii;
use frontend\models\Product;
use frontend\models\TraceabilityInfonew;
use yii\helpers\ArrayHelper;
class TraceabilityController extends \yii\web\Controller
{
    public $layout='user';

    public function beforeAction($action)
    {


        if (parent::beforeAction($action)) {
            $Connection = \Yii::$app->db;
            $data = '`tbhome_traceability_data_'.\Yii::$app->user->id.'`';
            $moban = '`tbhome_traceability_data`';
            $sql = 'CREATE TABLE IF NOT EXISTS '.$data.' LIKE '.$moban;
            $command=$Connection->createCommand($sql);
            $command->execute();

            $traceaInfo='tbhome_traceability_info_'.\Yii::$app->user->id;
            $mobanInfo = 'tbhome_traceability_info';
            $sqlInfo = 'CREATE TABLE IF NOT EXISTS '.$traceaInfo.' LIKE '.$mobanInfo;
            $commandInfo=$Connection->createCommand($sqlInfo);
            $commandInfo->execute();



            if ($this->enableCsrfValidation && Yii::$app->getErrorHandler()->exception === null && !Yii::$app->getRequest()->validateCsrfToken()) {
                throw new BadRequestHttpException(Yii::t('yii', 'Unable to verify your data submission.'));
            }
            return true;
        }

        return false;
    }



    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionGenproduct()
    {
        $uid=Yii::$app->user->id;
        $product=Product::find()->where(['uid'=>$uid])->all();
        $listData=ArrayHelper::map($product, 'id', 'name');

        $TraceabilityInfo=TraceabilityInfonew::find()->all();
        //->where(['uid'=>$uid])->all();
        $listTraceabilityInfo=ArrayHelper::map($TraceabilityInfo, 'id', 'label');
        $model = new TraceabilityData();
        if (!$listTraceabilityInfo){
            Yii::$app->getSession()->setFlash('danger', '请先添加追溯信息！');
            return $this->redirect(['traceabilityinfo/index']);
        }
        if (!$listData){
            Yii::$app->getSession()->setFlash('danger', '请先添加产品！');
            return $this->redirect(['product/index']);
        }
        return $this->render('_form_genproduct', [
            'model' => $model,
            'listData'=>$listData,
            'listTraceabilityInfo'=>$listTraceabilityInfo,

        ]);
    }

    public function actionPostgenproduct()
    {
        $Connection = \Yii::$app->db;
        $table='tbhome_traceability_data_'.Yii::$app->user->id;

        $model = new TraceabilityData();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                for ($i=0; $i<=(intval($_POST['sNum'])-1); $i++) {
              //      $code = $this->random(intval($_POST['slen']), $_POST['rule'], false);
                    $tableColumn[$i]=[Yii::$app->user->id, intval($model->productid), intval($model->traceabilityid), time(), 0, 0, 10,$model->remark];
                }


                $result=$Connection->createCommand()->batchInsert($table, ['uid', 'productid', 'traceabilityid', 'create_time', 'query_time', 'clicks', 'status', 'remark'], $tableColumn)->execute();
                if (!$result){echo '数据插入失败！';}
                //$i++;
            }else{echo '数据无效';}
        }


        $successMsg='成功生成'.$_POST['sNum'].'条数据！';
        Yii::$app->getSession()->setFlash('success', $successMsg);
        return $this->redirect(['traceability/genproduct']);
    }

    public function actionChecktraceability(){
        header('Content-Type:text/html;charset=UTF-8');
        $uid=Yii::$app->user->id;
        $traceabilityCode = $_POST['sStr'];
        $traceabilityinfo=TraceabilityInfonew::findOne(['code'=>$traceabilityCode]);
        if(!$traceabilityinfo){
            return 0;//false;
        }else{
            return $traceabilityinfo->id;
           // var_dump($traceabilityinfo->id);
       }


    }



    public function actionPage($id=1, $uid=1)
    {
        $connection=Yii::$app->db;
        $table='tbhome_traceability_data_'.$uid;
        //      $sql='SELECT * FROM '.$table.' WHERE code="'.$code.'"';
        $sql="SELECT * FROM ".$table." WHERE id=".$id;
        $command = $connection->createCommand($sql);
        $traceabilityData=$command->queryOne();//返回数组，表anti_code_uid

            $traceabilityid=$traceabilityData['traceabilityid'];
            $productid=$traceabilityData['productid'];


        $tabletracea='tbhome_traceability_info_'.$uid;
        $sqltracea="SELECT * FROM ".$tabletracea." WHERE id=".$traceabilityid;
        $commandtracea = $connection->createCommand($sqltracea);
        $traceabilityinfo=$commandtracea->queryOne();
        $describe=$traceabilityinfo['describe'];


        $product=Product::findOne($productid);
            $clicks=intval($traceabilityData['clicks'])+1;
            Yii::$app->db->createCommand()->update($table, ['clicks' => $clicks, 'query_time'=>time()], "id =".$id)->execute();

        $productImage='<img src="'.$product->image.'" >';
            $reply=str_replace([
                 '[Clicks]', '[Remark]', '[Factory]', '[Product]', '[Brand]', '[Spec]', '[Price]', '[Image]', '[Desc]', '[Unit]'
            ], [
                $traceabilityData['clicks'], $traceabilityData['remark'], $product->factory, $product->name, $product->brand, $product->specification, $product->price, $productImage, $product->describe, $product->unit
            ], $describe);


            return $this->renderPartial(
                'page',
                [
                    'traceabilityinfo'=>$traceabilityinfo,
                    'queryResult'=>$reply,
                    'product'=>$product,
                    'colour'=>'success',
                ]
            );

    }






}

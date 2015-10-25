<?php

namespace frontend\controllers;
use frontend\models\TraceabilityData;
use Yii;
use frontend\models\Product;
use frontend\models\TraceabilityInfo;
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
        $TraceabilityInfo=TraceabilityInfo::find()->where(['uid'=>$uid])->all();
        $listTraceabilityInfo=ArrayHelper::map($TraceabilityInfo, 'id', 'label');
        $model = new TraceabilityData();
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











}

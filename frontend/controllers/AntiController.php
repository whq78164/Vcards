<?php
namespace frontend\controllers;
use Yii;
use common\models\User;
use frontend\models\Info;
use frontend\models\AntiReply;
use frontend\models\AntiSetting;

class AntiController extends \yii\web\Controller
{
    public function actionIndex($uid=1)
    {
//        $antireply=new AntiReply();
//        $model=User::findIdentity($uid);
        $info = Info::findOne(['uid'=>$uid]);

//        $model=$antireply->findOne($uid);


 //       return $this->renderPartial(
        return $this->renderPartial(
            //'_form_antireply',
            'index',
           ['info'=>$info,]
        );
    }


    public function actionForm_antireply()
    {
        $model = new AntiReply();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                // form inputs are valid, do something here
                return;
            }
        }

        return $this->render('_form_antireply', [
            'model' => $model,
        ]);
    }

    public function actionForm_antisetting()
    {
        $model = new AntiSetting();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                // form inputs are valid, do something here
                return;
            }
        }

        return $this->render('_form_antisetting', [
            'model' => $model,
        ]);
    }



}

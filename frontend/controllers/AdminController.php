<?php

namespace frontend\controllers;
use frontend\models\Site;
use frontend\models\UserSearch;
use frontend\models\SignupForm;
use Yii;
use common\models\User;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class AdminController extends \yii\web\Controller
{
    public $layout='admin';


    public function actionSite()
    {
        if (Yii::$app->user->identity->role!==100) {
            $this->goBack();
        }
        $model = new Site();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                // form inputs are valid, do something here
                return;
            }
        }

        return $this->render('site', [
            'model' => $model,
        ]);
    }



    public function actionIndex()
    {


        return $this->render('index');
    }


    public function actionIndexuser()
    {

        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('/user/indexuser', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
     //   if (Yii::$app->user->identity->role!==100) {
     //       $this->goBack();
    //    }
        return $this->render('/user/view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionDelete($id)
    {

        $this->findModel($id)->delete();

        return $this->redirect(['admin/indexuser']);
    }

    protected function findModel($uid)
    {
        if (($model = User::findOne($uid)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }




    public function actionUpdate($id)
    {

        //$model = User::findIdentity($id);

        $model = new User();

        $request = Yii::$app->request;
        $model = $model->findIdentity($id);
        if ($request->isPost) {


      //      $post = $request->post();
      //      var_dump($_POST);
            $password=$_POST['User']['password'];



            $model->load($request->post());
            if (strlen($password)>5){
                $password_hash = Yii::$app->security->generatePasswordHash($password);
                $model->password_hash=$password_hash;
            }else{
                Yii::$app->getSession()->setFlash('danger', '密码未修改');
            }
            //  var_dump($model);

            $model->save();
             $this->redirect(['admin/view', 'id' => $model->uid]);
       //     var_dump($password);
        } else {
            return $this->render('/user/update', [
                'model' => $model,
            ]);
        }
    }


    public function actionCreate()
    {

        //$model = User::findIdentity($id);

        $model = new User();

        $request = Yii::$app->request;
        if ($request->isPost) {

            $password=$_POST['User']['password'];

            $model->load($request->post());
            if (strlen($password)>5){
                $password_hash = Yii::$app->security->generatePasswordHash($password);
                $model->password_hash=$password_hash;
            }else{
                Yii::$app->getSession()->setFlash('danger', '密码长度不够');
            }
            //  var_dump($model);

            $model->save();
            $this->redirect(['admin/view', 'id' => $model->uid]);
            //     var_dump($password);
        } else {
            return $this->render('/user/create', [
                'model' => $model,
            ]);
        }
    }





}

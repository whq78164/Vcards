<?php

namespace frontend\controllers;
use frontend\models\Site;
use frontend\models\UserSearch;
use frontend\models\SignupForm;
use Yii;
use common\models\User;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use linslin\yii2\curl;

class AdminController extends \yii\web\Controller
{
    public $layout='admin';


    public function actionSite()
    {
        if (Yii::$app->user->identity->role!==100) {
            $this->goBack();
        }

        $curl = new curl\Curl();
        $url='http://www.vcards.top/index.php?r=cloud/site';
        $response = $curl->get($url);
        $response=json_decode($response);

        $modelRemote=$response;
      //  $localmodel=Site::findOne(1);

        $model = new Site();
        $model->admin_user=$modelRemote->admin_user;
        $model->sitetitle=$modelRemote->sitetitle;

      //  $model->user_password=$_POST['user_password'];
        $model->tel= $modelRemote->tel;
        $model->qq=$modelRemote->qq;
        $model->email=$modelRemote->email;
        $model->siteurl=$modelRemote->siteurl;
        $model->ip=$modelRemote->ip;



        if (Yii::$app->request->post()) {
            $model = new Site();
            $model->load(Yii::$app->request->post());
            if ($model->validate()) {
                $response=$curl->setOption(
                    CURLOPT_POSTFIELDS,
                    http_build_query([
                        'admin_user' => $model->admin_user,
                        'user_password' => $model->user_password,
                        'sitetitle' => $model->sitetitle,
                        'tel' => $model->tel,
                        'qq' => $model->qq,
                        'email' => $model->email,
                        'siteurl' => $model->siteurl,
                    ])
                )->post($url);

                $model->save();// form inputs are valid, do something here
                Yii::$app->getSession()->setFlash('success', $response);
                return $this->goBack(['admin/site']);//redirect(['user/user']);
            }
        }

   //    var_dump($modelRemote);

        return $this->render('site', [
            'model' => $model,
        ]);


    }



    public function actionIndex()
    {
        $curl = new curl\Curl();
        $url='http://www.vcards.top/index.php?r=cloud/index';
        $response = $curl->get($url);
     //   $response=json_decode($response);

        return $this->render('index',
        [
            'model'=>$response//->content
        ]
        );
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

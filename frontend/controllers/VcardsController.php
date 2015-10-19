<?php

namespace frontend\controllers;

use Yii;
use yii\db\Query;
use common\models\LoginForm;
use frontend\models\SignupForm;
use common\models\User;
use frontend\models\Info;
use frontend\models\Microlink;
use frontend\models\Micropage;
use frontend\models\Setting;
use yii\db\Connection;
class VcardsController extends \yii\web\Controller
{
/*
      public function actions()
    {
        return [
            'page' => [
                'class' => 'yii\web\ViewAction',
            ],
        ];
    }
现在如果你在@app/views/site/pages目录下创建名为 about 的视图， 可通过如下rul显示该视图：

http://localhost/index.php?r=site/page&view=about

*/

    public $layout = '886';


    public function actionIndex($uid=1)
    {
        /*       $users = new Query();
        $user1 = $users
            ->from('tbhome_user')
            ->where(['uid' => $uid ])
            ->one();
        $user2 = $users
            ->from('tbhome_card_info')
            ->where(['uid' => $uid ])
            ->one();
        if (!$user2){
            $user2=array();
        }
*/
        $user1=User::findOne($uid)->attributes;
        $user2=Info::findOne($uid);
        $setting=Setting::findOne($uid);
        if($setting==null){
            $setting=new Setting();
            $setting->bg_image='Uploads/bg_image/tbhome.jpg';
        }

        if ($user2==null) {
            Yii::$app->getSession()->setFlash('danger', '请填写名片信息！');
            $this->redirect(['user/user']);
        }
        $user2=Info::findOne($uid)->attributes;
        $user = array_merge($user1, $user2);
        $microlink=Microlink::find()->where(['uid' => $uid, 'status' => 10])->all();
        $micropage=Micropage::find()->where(['uid' => $uid, 'status' => 10])->all();

      //  if ($microlink==null) {$microlink=new Microlink();}
      //  var_dump($micropage);
        return $this->renderPartial('index',
            [
                'bg_image'=>$setting->bg_image ? $setting->bg_image : 'Uploads/bg_image/tbhome.jpg',
                'user0'=>$user1,
                'userdata'=>$user,
                'microlink'=>$microlink,
                'micropage'=>$micropage,
            ]
        );

    }

    public function actionMicropage($id=1)
    {
        $micropage= Micropage::findOne(['id'=>$id]);//find()->where(['uid' => $uid, 'id' => $id])->all();
        if (!$micropage) {$micropage=new Micropage();}
        return $this->renderPartial('micropage',
            [
                'micropage'=>$micropage,
            ]
        );

    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

//        return $this->goHome();
       return $this->redirect('@web/index.php?r=vcards/index');

    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            //  return $this->goBack();
            return $this->redirect('@web/index.php?r=user/index');
        } else {
//            return $this->renderPartial('glogin', [
return $this->render('glogin', [
             //   'model' => $model,
             //   'checked1' => 'checked',
             //   'checked2' =>'',
            ]);
        }
    }




	
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
  //                  return $this->goHome();
                    return $this->redirect('@web/index.php?r=vcards/index');
                }{echo '登录失败!';}
            }else{echo '注册失败!';
            var_dump($_POST);
            }
        }

//        return $this->renderPartial('gsignup', [
return $this->render('gsignup', [
            'model' => $model,
    //        'checked1' => '',
    //        'checked2' =>'checked',
        ]);
    }







}

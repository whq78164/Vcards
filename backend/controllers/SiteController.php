<?php
namespace backend\controllers;

use Yii;

use yii\web\Controller;
use backend\models\LoginForm;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],//@已登录用户，允许已登录用户访问logout和index
                    ],
                ],
            ],
            'verbs' => [//VerbFilter检查请求动作的HTTP请求方式是否允许执行，如果不允许，会抛出HTTP 405异常。
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    //语言切换
/*    public function actionLanguage(){
        $language=  \Yii::$app->request->get('lang');

        if(isset($language)){
            \Yii::$app->session['language']=$language;
        }

        //切换完语言哪来的返回到哪里
        $this->goBack(\Yii::$app->request->headers['Referer']);
    }
*/
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
           // return $this->goBack();
            return $this->redirect('admin/index');
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }



    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}

<?php

namespace frontend\controllers;

use Yii;
use common\models\User;
use frontend\models\Info;
//use frontend\models\SignupForm;
//use frontend\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    public $layout='user';


    /**
     * @inheritdoc
     * http://www.yiichina.com/doc/guide/2.0/security-authorization
     * http://www.yiichina.com/doc/guide/2.0/structure-filters
     */

    /*
     * 存取控制过滤器（ACF）是一种通过 yii\filters\AccessControl 类来实现的简单授权方法， 非常适用于仅需要简单的存取控制的应用。正如其名称所指，ACF 是一个种行动（action）过滤器 filter，可在控制器或者模块中使用。当一个用户请求一个 action 时， ACF会检查 yii\filters\AccessControl::rules 列表，判断该用户是否允许执 行所请求的action。
     *
     *
     *
     * ACF 自顶向下逐一检查存取规则，直到找到一个与当前 欲执行的操作相符的规则。 然后该匹配规则中的 allow 选项的值用于判定该用户是否获得授权。如果没有找到匹配的规则， 意味着该用户没有获得授权。
     *
     * yii\filters\AccessRule::allow： 指定该规则是 "允许" 还是 "拒绝" 。（译者注：true是允许，false是拒绝）

    yii\filters\AccessRule::actions：指定该规则用于匹配哪些操作。 如果该选项为空，或者不使用该选项， 意味着当前规则适用于所有的操作。

    yii\filters\AccessRule::controllers：指定该规则用于匹配哪些控制器。 它的值应为控制器ID数组。匹配比较是大小写敏感的。如果该选项为空，或者不使用该选项， 则意味着当前规则适用于所有的操作。（译者注：这个选项一般是在控制器的自定义父类中使用才有意义）

    yii\filters\AccessRule::roles：指定该规则用于匹配哪些用户角色。 系统自带两个特殊的角色，通过 yii\web\User::isGuest 来判断：

    ?： 用于匹配访客用户 （未经认证）
    @： 用于匹配已认证用户
    使用其他角色名时，将触发调用 yii\web\User::can()，这时要求 RBAC 的支持 （在下一节中阐述）。 如果该选项为空或者不使用该选项，意味着该规则适用于所有角色。
     * **/
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
 /*only 选项指定了当前 ACF 只应被应用在 login、logout 和 signup 这三个动作上。*/
                'rules' => [
                    [
                        'actions' => ['login'],
                        'allow' => true,
                        'roles' => ['?'],
 /*roles 选项 ? 是一个特殊的标识，代表”访客用户”。*/
                    ],
                    [
                        'actions' => ['index','update','logout',],
                        'allow' => true,
                        'roles' => ['@'],
    /*允许已认证用户执行 logout 操作。@是另一个特殊标识， 代表”已认证用户”。*/
                    ],
                ],
            ],
            'verbs' => [
  /*VerbFilter检查请求动作的HTTP请求方式是否允许执行，如果不允许，会抛出HTTP 405异常。*/
                'class' => VerbFilter::className(),
                'actions' => [
    //                'delete' => ['post'],

     //               'index'  => ['get'],
    //                'view'   => ['get'],
    //                'create' => ['get', 'post'],
                 'update' => ['get', 'put', 'post'],

                ],
            ],
        ];
    }



    /**
     * Lists all User models.
     * @return mixed
     */
    /*
        public function actionIndex()
        {
            $searchModel = new UserSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }

    */
       public function actionIndex()
       {
        //   return $this->redirect(['user/user']);
           $this->redirect(['/user/user']);
       }

       public function actionUser()
       {
           $uid=Yii::$app->user->id;
           $model = $this->findModel($uid);

           if ($model->load(Yii::$app->request->post()) && $model->save()) {
               return $this->redirect([
                   'user',
                   // id' => $model->uid,
               ]);
           } else {

           return $this->render('user', [
               'model' => $model,
           ]);}
       }

    public function actionInfo()
    {
        $id=Yii::$app->user->id;
        $model = new Info();
        $model->uid=$id;
//        ($model = Info::findOne($id))

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', //'id' => $model->uid
            ]);
        } else {
            $tempmodel=Info::findOne($id);
            if ($tempmodel){
                $model=$tempmodel;
            return $this->render('info', [
                'model' => $model,
            ]);}else//if($tempmodel==null)
            {
                return $this->render('info', [
                    'model' => $model,
                ]);
            }
        }

    }

       /**
        * Displays a single User model.
        * @param integer $id
        * @return mixed
        */
       public function actionView($id)
       {
           return $this->render('view', [
               'model' => $this->findModel($id),
           ]);
       }

       /**
        * Creates a new User model.
        * If creation is successful, the browser will be redirected to the 'view' page.
        * @return mixed
        *
       public function actionCreate()
       {
           $model = new User();

           if ($model->load(Yii::$app->request->post()) && $model->save()) {
               return $this->redirect(['view', 'id' => $model->uid]);
           } else {
               return $this->render('create', [
                   'model' => $model,
               ]);
           }
       }

       /**
        * Updates an existing User model.
        * If update is successful, the browser will be redirected to the 'view' page.
        * @param integer $id
        * @return mixed
        */
    public function actionSetting()
    {

 //       $model = $this->findModel($id);
        $model = Yii::$app->user->identity;


            return $this->render('setting', [
                'model' => $model,
                'passwordstatus'=>'',

            ]);

    }

    public function actionPassword()
    {

        $uid = Yii::$app->user->id;
        $model = new User();
        $model = $model->findIdentity($uid);

        //      $model = Yii::$app->user->identity;
        $request = Yii::$app->request;
        $post = $request->post();
        $password_hash = Yii::$app->security->generatePasswordHash($post['password']);

        if ($request->isPost) {
            //   var_dump($post);
            //   echo $model->validatePassword($post['oldpassword']);
            //   Yii::$app->security->validatePassword($password, $this->password_hash);

            if (!$model->validatePassword($post['oldpassword'])) {
                echo '原密码输入错误！';
            } elseif ($post['password'] !== $post['repassword']) {
                echo '两次输入的新密码不一致！';
            } elseif($password_hash) {
                $model->password_hash=$password_hash;//$password_hash
                $model->save();

                echo '密码设置成功！';
                return $this->redirect(['user/user']);
            /*    return $this->render('setting', [
                    'model' => $model,
                    'passwordstatus' => '数据提交成功',
                ]);*/
            }else{
                echo '未知错误！';
                var_dump($post['password']);
                echo $post['password'];
                var_dump($model->setPassword($post['password']));
            }
        } else {
            echo '数据提交失败！';
        }

    }


    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     *
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($uid)
    {
        if (($model = User::findOne($uid)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}

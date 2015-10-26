<?php

namespace frontend\controllers;

use Yii;
use frontend\models\AntiCode;
use frontend\models\AntiCodeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\AntiCodenew;
use yii\helpers\ArrayHelper;
use frontend\models\Product;


/**
 * AnticodeController implements the CRUD actions for AntiCode model.
 */
class AnticodeController extends Controller
{
    public $layout='user';
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all AntiCode models.
     * @return mixed
     */
    public function actionIndex()
    {
        $uid=Yii::$app->user->id;
        $table='tbhome_anti_code_'.$uid;
        $ta=Yii::$app->db->createCommand("SHOW TABLES LIKE '".$table."'")->queryAll();
        if($ta==null){
            Yii::$app->getSession()->setFlash('danger', '请先生成防伪码！');
            return $this->redirect(['anti/gencode']);
        }else{
            $product=Product::find()->where(['uid'=>$uid])->all();
            $listProduct=ArrayHelper::map($product, 'id', 'name');
            $listProduct['']='全部';
        $searchModel = new AntiCodeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'listProduct' => $listProduct,
        ]);
        }
    }

    /**
     * Displays a single AntiCode model.
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
     * Creates a new AntiCode model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AntiCode();
        $model->uid=Yii::$app->user->id;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing AntiCode model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->uid=Yii::$app->user->id;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing AntiCode model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AntiCode model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AntiCode the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AntiCodenew::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

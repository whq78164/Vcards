<?php

namespace frontend\controllers;

use frontend\models\TraceabilityDatanew;
use frontend\models\TraceabilityInfo;
use frontend\models\TraceabilityinfoSearch;
use Yii;
use frontend\models\TraceabilityData;//小写data
use frontend\models\TraceabilitydataSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use frontend\models\Product;
use frontend\models\ProductSearch;
use yii\helpers\Url;
//use frontend\models\TraceabilityInfo;

/**
 * TraceabilitydataController implements the CRUD actions for Traceabilitydata model.
 */
class TraceabilitydataController extends Controller
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
     * Lists all Traceabilitydata models.
     * @return mixed
     */
    public function actionIndex()
    {

        $uid=Yii::$app->user->id;
        $dirPath = 'Uploads/' . $uid . '/GenQRcode/';
        if (!file_exists($dirPath)) {
            mkdir($dirPath, 0777, true);
        }


        $table='tbhome_traceability_data_'.$uid;
        $ta=Yii::$app->db->createCommand("SHOW TABLES LIKE '".$table."'")->queryAll();
        if($ta==null){
            Yii::$app->getSession()->setFlash('danger', '请先批量生产数据！');
            return $this->redirect(['traceability/genproduct']);
        }else {
      //      $uid=Yii::$app->user->id;
            $product=Product::find()->where(['uid'=>$uid])->all();

            $listProduct=ArrayHelper::map($product, 'id', 'name');
            $listProduct['']='全部';

            $searchModel = new TraceabilitydataSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
          $traceabilitySearch = new TraceabilityinfoSearch();

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'listProduct' => $listProduct,
                'traceabilitySearch' => $traceabilitySearch,
            ]);
        }
    }

    /**
     * Displays a single Traceabilitydata model.
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
     * Creates a new Traceabilitydata model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Traceabilitydata();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Traceabilitydata model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Traceabilitydata model.
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
     * Finds the Traceabilitydata model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Traceabilitydata the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TraceabilityDatanew::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionExcelall(){


        $objPHPExcel=new \PHPExcel();
        $objPHPExcel->getProperties()  //获得文件属性对象，给下文提供设置资源
        ->setCreator( "798904845")                 //设置文件的创建者
        ->setLastModifiedBy( "Maarten Balliauw")          //设置最后修改者
        ->setTitle( "Office 2007 XLSX Test Document" )    //设置标题
        ->setSubject( "Office 2007 XLSX Test Document" )  //设置主题
        ->setDescription( "Test document for Office 2007 XLSX, generated using PHP classes.") //设置备注
        ->setKeywords( "office 2007 openxml php")        //设置标记
        ->setCategory( "Test result file");

        $objPHPExcel->setActiveSheetIndex(0);
        $objActivSheet=$objPHPExcel->getActiveSheet();
        $objActivSheet->setCellValue('A1', '序号')
            ->setCellValue('B1', '产品')
            ->setCellValue('C1', '扫描次数')
            ->setCellValue('D1', '创建时间')
            ->setCellValue('E1', '查询时间')
            ->setCellValue('F1', '生产备注')
            ->setCellValue('G1', '内部备注')
            ->setCellValue('H1', '网址');


        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $start=$_POST['start'];
            $end=$_POST['end'];
            $data=TraceabilityDatanew::find()->where('id>='.$start.' AND id<='.$end);
            $num=$data->count();
            $data= $data->all();
        }else{

            $data=TraceabilityDatanew::find();//->asArray();
            $num=$data->count();
            $data= $data->all();
        }
        for($i=2; $i<($num+2); $i++){
            $arrid=$i-2;
            $createTime=date('Y-m-d H:m:s', $data[$arrid]->create_time);
            $queryTime =$data[$arrid]->query_time==0 ? 0 : date('Y-m-d H:m', $data[$arrid]->query_time);

            $url=Url::to(['/traceability/page', 'id'=>$data[$arrid]->id, 'uid'=>$data[$arrid]->uid], true);


            $objActivSheet->setCellValue('A'.$i, $data[$arrid]->id)
                ->setCellValue('B'.$i, $data[$arrid]->productid)
                ->setCellValue('C'.$i, $data[$arrid]->clicks)
                ->setCellValue('D'.$i, $createTime)
                ->setCellValue('E'.$i, $queryTime)
                ->setCellValue('F'.$i, $data[$arrid]->remark)
                ->setCellValue('G'.$i, $data[$arrid]->localremark)//->setCellValue('G'.$i, $data[$arrid]->url)
                ->setCellValue('H'.$i, $url);
        }



        $objActivSheet->setTitle('Traceability');
        $name='Traceability';
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$name.'.xls"');
        header('Cache-Control: max-age=0');
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        exit;


    }

    public function actionGenimage(){

        require(__DIR__ . '/../assets/phpqrcode/qrlib.php');
        $uid = Yii::$app->user->id;

        if (is_numeric($_POST['start']) && is_numeric($_POST['end']) && ($_POST['end'] > $_POST['start'])) {

            $date = date('Y_m_d_Hms_', time());
            $rand = rand();
            $dirPath = 'Uploads/' . $uid . '/GenQRcode/' . $date . $rand . '/';
            if (!file_exists($dirPath)) {
                mkdir($dirPath, 0777, true);
            }

            $start = $_POST['start'];
            $end = $_POST['end'];
            $data = TraceabilityDatanew::find()->where('id>=' . $start . ' AND id<=' . $end);
            $num = $data->count();
            $data = $data->all();

            for ($i = 0; $i < $num; $i++) {
                $id = $data[$i]->id;
                //   $url = $data[$i]->url;
                $url=Url::to(['/traceability/page', 'id'=>$id, 'uid'=>$data[$i]->uid], true);


                \QRcode::png($url, $dirPath . $id . '.png', 'H', 6, 1);
            }

            //         $dirPath = 'Uploads/' . $uid . '/GenQRcode/' . $date . $rand. '/';


            $dir = opendir($dirPath);
            $filename = 'Uploads/' . $uid . '/GenQRcode/' . 'image' . time() . '_' . $rand . '.zip';
            $zip = new \ZipArchive;
            if ($zip->open($filename, \ZipArchive::CREATE) === TRUE) {
                while (($file = readdir($dir)) !== false) {
                    if ($file !== "." && $file !== "..") {//文件夹文件名字为'.'和‘..’，不要对他们进行操作

                        $zip->addFile($dirPath.$file);//假设加入的文件名是image.txt，在当前路径下
                        //   echo $file;
                    }
                }

            }

            $zip->close();
            closedir($dir);

            function delDirAndFile( $dirName )
            {
                if ( $handle = opendir( "$dirName" ) ) {
                    while ( false !== ( $item = readdir( $handle ) ) ) {
                        if ( $item != "." && $item != ".." ) {
                            if ( is_dir( "$dirName/$item" ) ) {
                                delDirAndFile( "$dirName/$item" );
                            } else {
                                if( unlink( "$dirName/$item" ) )echo "成功删除文件： $dirName/$item<br />\n";
                            }
                        }
                    }
                    closedir( $handle );
                    if( rmdir( $dirName ) )echo "成功删除目录： $dirName<br />\n";
                }
            }

            //     $uid = Yii::$app->user->id;
            //     $dirPath = 'Uploads/' . $uid . '/GenQRcode';


//文件的类型
            header('Content-type: application/zip');
//下载显示的名字
            header('Content-Disposition: attachment; filename="QRcodeImage.zip"');
            readfile($filename);
            delDirAndFile($dirPath);
            //  $this->redirect(['index']);
            //    Yii::$app->getSession()->setFlash('success', '已生产二维码图片' . $num . '张, 目录' . $dirPath);
            exit();


        }else{
            Yii::$app->getSession()->setFlash('danger', '防伪码序号输入错误');

        }



    }


}

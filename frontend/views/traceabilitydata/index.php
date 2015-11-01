<?php

use yii\helpers\Html;
use yii\grid\GridView;
use frontend\models\Product;
use frontend\models\TraceabilityInfo;


/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TraceabilitydataSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $listProduct frontend\models\Product */

$this->title = Yii::t('tbhome', 'Traceabilitydata');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="traceabilitydata-index col-md-12">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?//= Html::a(Yii::t('tbhome', 'Add'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            ['attribute' => 'id',
                //    'label'=>'创建时间',
                'headerOptions' => ['width' => '70'],
            ],
            //'uid',

            [
                'attribute' => 'productid',
                'label' => '产品名称',
            'filter' => Html::activeDropDownList($searchModel, 'productid', $listProduct, ['class' => 'form-control']),
                'value' => function ($model) {
               // 'content' => function ($model) {
                    $productid=$model->productid;
                    $product=Product::findOne($productid);
                    return Html::encode($product->name);
                 //   return Html::a("请求地址", $model->productid);
                },
            ],
       //     'traceabilityid',

            //[
           //     'attribute' => 'code',
        //        'label' => '追溯编码',
       //        'filter' =>'' ,//Html::activeTextInput($traceabilitySearch, 'code', ['class' => 'form-control']),
   // 'value' => function ($model) {
    // 'content' => function ($model) {
  //  $traceabilityid=$model->id;
    //    if($productid==0){return '无';}
  //  $traceability=TraceabilityInfo::findOne($productid);
  //  return Html::encode($traceability->code);}
             //   'value' => 'tbhome_traceability_info.code',
   //         ],


      //      'query_time:datetime',
            [
                'attribute' => 'clicks',
                    'label'=>'扫描次数',

                'headerOptions' => ['width' => '70'],
            ],
            [
                'attribute' => 'create_time',
                //    'label'=>'创建时间',
                'filter' =>'' ,
                'value'=>
                    function($model){
                        return  date('Y-m-d H:i:s',$model->create_time);   //主要通过此种方式实现
                    },
                'headerOptions' => ['width' => '170'],
            ],
            'remark',
            [
                'header'=>'二维码图片', 'format' => 'html', 'value'=>function($data){
                $urlval=yii\helpers\Url::to(['traceability/page', 'id'=>$data->id, 'uid'=>$data->uid], true);
                $urlval=urlencode($urlval);
                $src='http://www.vcards.top/qrcode.php?value='.$urlval;
                return   //'&lt;img src="'.$src.'"&gt;';
                    Html::img($src, ['width'=>'150px']);
            },
            ],
            [
                'header'=>'网页', 'format' => 'html', 'value'=>function($data){

                //return '<a href="'.$data->url.'"></a>';
                return Html::a('查看',['/traceability/page', 'id'=>$data->id, 'uid'=>Yii::$app->user->id]);
            }
            ],



   //         ['attribute' => 'create_time', 'format' => ['date', 'php:Y年m月d日']],

            // 'status',
            ['class' => 'yii\grid\ActionColumn', 'template' => '{view} {update}'],
            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

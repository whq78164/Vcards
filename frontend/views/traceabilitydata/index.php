<?php

use yii\helpers\Html;
use frontend\models\Product;
//use frontend\models\TraceabilityInfo;
//use kartik\grid\GridView;
//use yii\widgets\Pjax;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TraceabilitydataSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $listProduct frontend\models\Product */

$this->title = Yii::t('tbhome', 'Traceabilitydata');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="traceabilitydata-index col-md-12">

    <div class="page-header">
            <h1><?= Html::encode($this->title) ?></h1>
        </div>
    <?=GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,

        'columns' => [
       //     ['class' => 'yii\grid\SerialColumn'],

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
                        return  date('Y-m-d H:i',$model->create_time);   //主要通过此种方式实现
                    },
                'headerOptions' => ['width' => '170'],
            ],
            'remark',

            'localremark',



   //         ['attribute' => 'create_time', 'format' => ['date', 'php:Y年m月d日']],

            // 'status',
            ['class' => 'yii\grid\ActionColumn', 'header'=>'操作', 'template' => '{view} {update}'],






            [
                'class' => 'yii\grid\ActionColumn', //'template' => '{view} {update}'
                'header'=>'网址',
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                      //  $url=$model->url;
                        $options = [
                        //    'title' => Yii::t('yii', 'View'),
                       //     'aria-label' => Yii::t('yii', 'View'),
                         //   'data-pjax' => '0',
                            'class'=>'glyphicon glyphicon-link'
                        ];
                        return Html::a('',['/traceability/page', 'id'=>$model->id, 'uid'=>$model->uid], $options);
                     //   return Html::a('<span class="glyphicon glyphicon-link"></span>', $url, $options);
                    },
                    'update'=>function(){},'delete'=>function(){},
                ],

            ],


        ],
    ]);?>

    <form method="post" id="login-form" role="form" action="<?=yii\helpers\Url::to(['excelall'])?>" >
        <label>按序号导出数据：</label>
        <input name="_csrf" type="hidden" id="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
        <input name="start" type="text" placeholder="第一条数据序号">
        <input name="end" type="text" placeholder="最后一条数据序号">
        <button class= 'btn btn-success' type="submit">导出所选数据</button>
    </form>

    <form method="post" id="login-form" role="form" action="<?=yii\helpers\Url::to(['genimage'])?>" >
        <label>生产二维码图片(一次最多200张)：</label>
        <input name="_csrf" type="hidden" id="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
        <input name="start" type="text" placeholder="第一条数据序号">
        <input name="end" type="text" placeholder="最后一条数据序号">
        <button class= 'btn btn-success' type="submit">下载二维码</button>
    </form>



</div>

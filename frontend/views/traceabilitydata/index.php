<?php

use yii\helpers\Html;
use frontend\models\Product;
use frontend\models\TraceabilityInfo;
use kartik\grid\GridView;
use yii\widgets\Pjax;


/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TraceabilitydataSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $listProduct frontend\models\Product */

$this->title = Yii::t('tbhome', 'Traceabilitydata');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="traceabilitydata-index col-md-12">


    <?php Pjax::begin(); echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'panel' => [
            'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-th-list"></i> '.Html::encode($this->title).' </h3>',
            'type'=>'info',
            //   'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> '.Yii::t('tbhome', 'Add'), ['create'], ['class' => 'btn btn-success']),
            'after'=>Html::a('<i class="glyphicon glyphicon-repeat"></i> 重置', ['index'], ['class' => 'btn btn-info']),
            'showFooter'=>false
        ],
        'responsive'=>true,
        'hover'=>true,
        'condensed'=>true,
        'floatHeader'=>true,
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
                'header'=>'浏览', 'format' => 'html', 'value'=>function($data){
                return Html::a('查看',['/traceability/page', 'id'=>$data->id, 'uid'=>Yii::$app->user->id]);
            }
            ],

        ],
    ]); Pjax::end(); ?>

</div>

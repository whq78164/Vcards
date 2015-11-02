<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use frontend\models\Product;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\AntiCodeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('tbhome', 'Anti Code');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anti-code-index col-md-12">

    <?php Pjax::begin(); echo GridView::widget([
    //    echo GridView::widget([
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
            ['class' => 'yii\grid\SerialColumn'],

       //     'traceabilityid',
//            'uid',
            'code',
            [
                'headerOptions' => ['width' => '170'],
                'attribute' => 'productid',
                'label' => '产品名称',
                'filter' => Html::activeDropDownList($searchModel, 'productid', $listProduct, ['class' => 'form-control']),
                'value' => function ($model) {
               // 'content' => function ($model) {
                    $productid=$model->productid;
                //    if($productid==0){return '无';}
                    $product=Product::findOne($productid);
                    return Html::encode($product->name);
                    //   return Html::a("请求地址", $model->productid);
                },
            ],
            'prize',


            ['attribute' => 'create_time', 'format' => ['date', 'php:Y年m月d日']],


            'clicks',
            'remark',
    /*        [
                'header'=>'二维码图片', 'format' => 'html', 'value'=>function($data){
                $urlval=yii\helpers\Url::to(['anti/antipage', 'code'=>$data->code, 'replyid'=>$data->replyid, 'productid'=>$data->replyid], true);
                $urlval=urlencode($urlval);
                $src='http://www.vcards.top/qrcode.php?value='.$urlval;
             return Html::img($src, ['width'=>'100px']);
            },
            ],
      */

 //           ['class' => 'yii\grid\ActionColumn'],
            ['class' => 'yii\grid\ActionColumn', 'header'=>'操作', 'template' => '{view} {update}'],
            [
                'header'=>'预览', 'format' => 'html', 'value'=>function($data){
                return Html::a('查看',$data->url, ['target' => '_blank', 'class'=>'klj']);
            }
            ],
        ],
    ]); Pjax::end(); ?>

</div>

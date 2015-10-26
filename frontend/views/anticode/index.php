<?php

use yii\helpers\Html;
use yii\grid\GridView;
use frontend\models\Product;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\AntiCodeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('tbhome', 'Anti Code');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anti-code-index col-md-12">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('tbhome', 'Add'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'uid',
            'code',
            [
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
//            ['attribute' => 'query_time', 'format' => ['date', 'php:Y年m月d日']],

            'clicks',
            [
                'header'=>'二维码图片', 'format' => 'html', 'value'=>function($data){
                $urlval=yii\helpers\Url::to(['anti/antipage', 'code'=>$data->code, 'replyid'=>$data->replyid, 'productid'=>$data->replyid], true);
                $urlval=urlencode($urlval);
                $src='http://www.vcards.top/qrcode.php?value='.$urlval;
             return   //'&lt;img src="'.$src.'"&gt;';
             Html::img($src, ['width'=>'150px']);
            },
            ],


 //           ['class' => 'yii\grid\ActionColumn'],
            ['class' => 'yii\grid\ActionColumn', 'template' => '{view} {update}'],
        ],
    ]); ?>

</div>

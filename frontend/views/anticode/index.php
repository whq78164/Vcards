<?php

use yii\helpers\Html;
use yii\grid\GridView;
use frontend\models\Product;
//use kartik\grid\GridView;
//use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\AntiCodeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('tbhome', 'Anti Code');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anti-code-index col-md-12">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //     'traceabilityid',
            'id',
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


            ['attribute' => 'create_time', 'format' => ['date', 'php:Y-m-d']],


            'clicks',
            'remark',
            /*      [
                         'header'=>'二维码图片', 'format' => 'html', 'value'=>function($data){
                         $urlval=yii\helpers\Url::to(['anti/antipage', 'code'=>$data->code, 'replyid'=>$data->replyid, 'productid'=>$data->replyid], true);
                         $urlval=urlencode($urlval);
                         $src='http://www.vcards.top/qrcode.php?value='.$urlval;
                      return Html::img($src, ['width'=>'100px']);
                     },
                     ],

         */
            //           ['class' => 'yii\grid\ActionColumn'],
            ['class' => 'yii\grid\ActionColumn', 'header'=>'操作', 'template' => '{view} {update}',],



            [
                'class' => 'yii\grid\ActionColumn', //'template' => '{view} {update}'
                'header'=>'网址',
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        $url=$model->url;
                        $options = [
                            'title' => Yii::t('yii', 'View'),
                            'aria-label' => Yii::t('yii', 'View'),
                            'data-pjax' => '0',
                        ];
                        return Html::a('<span class="glyphicon glyphicon-link"></span>', $url, $options);
                    },
                    'update'=>function(){},'delete'=>function(){},
                ],

            ],



        ],
         ]); ?>

    <?=Html::a('导出全部数据', ['excelall'], ['class' => 'btn btn-danger'])?>
    <form method="post" id="login-form" role="form" action="<?=yii\helpers\Url::to(['excelall'])?>" >
        <label>按序号导出数据：</label>
        <input name="_csrf" type="hidden" id="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
        <input name="start" type="text" placeholder="第一条数据序号">
        <input name="end" type="text" placeholder="最后一条数据序号">
        <button class= 'btn btn-success' type="submit">导出所选数据</button>
    </form>
    <p>
    <form method="post" id="login-form" role="form" action="<?=yii\helpers\Url::to(['genimage'])?>" >
        <label>生产二维码图片(一次最多200张)：</label>
        <input name="_csrf" type="hidden" id="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
        <input name="start" type="text" placeholder="第一条数据序号">
        <input name="end" type="text" placeholder="最后一条数据序号">
        <button class= 'btn btn-success' type="submit">下载二维码</button>
    </form>
    </p>

</div>

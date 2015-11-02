<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('tbhome', 'Products');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index col-md-12">


        <!--div class="page-header">
            <h1><?= Html::encode($this->title) ?></h1>
        </div-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?php Pjax::begin(); echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,

        'panel' => [
            'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-th-list"></i> '.Html::encode($this->title).' </h3>',
            'type'=>'info',
            'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> '.Yii::t('tbhome', 'Create Product'), ['create'], ['class' => 'btn btn-success']),
            'after'=>Html::a('<i class="glyphicon glyphicon-repeat"></i> 重置', ['index'], ['class' => 'btn btn-info']),
            'showFooter'=>false
        ],
        'responsive'=>true,
        'hover'=>true,
        'condensed'=>true,
        'floatHeader'=>true,

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

 //           'id',
   //         'uid',
     //       'share',

            [
                'header'=>'产品图片', 'format' => 'html', 'value'=>function($data){
                return   //'&lt;img src="'.$src.'"&gt;';
                    Html::img($data->image, ['width'=>'150px']);
            },
            ],

            'factory',
             'name',
    //         'describe',
             'specification',
    //         'unit',
             'brand',
             'price',
            // 'hot',

            [
                'class' => 'yii\grid\ActionColumn', 'template' => '{view} {update}'
              /*  'buttons' => [
                    'update' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', Yii::$app->urlManager->createUrl(['product/view','id' => $model->id,'edit'=>'t']), [
                            'title' => Yii::t('yii', 'Edit'),
                        ]);}
                ],*/
            ],

            //           ['class' => 'yii\grid\ActionColumn', 'template' => '{view} {update}'],
        ],



    ]); Pjax::end(); ?>



</div>

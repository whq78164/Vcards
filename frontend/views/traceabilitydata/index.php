<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TraceabilitydataSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('tbhome', 'Traceabilitydata');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="traceabilitydata-index col-md-12">

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

            ['attribute' => 'id',
                //    'label'=>'创建时间',
                'headerOptions' => ['width' => '70'],
            ],
            //'uid',
       //     'productid',
       //     'traceabilityid',
      //      'query_time:datetime',
            [
                'attribute' => 'clicks',
                //    'label'=>'创建时间',

                'headerOptions' => ['width' => '70'],
            ],
            [
                'attribute' => 'create_time',
                //    'label'=>'创建时间',
                'value'=>
                    function($model){
                        return  date('Y-m-d H:i:s',$model->create_time);   //主要通过此种方式实现
                    },
                'headerOptions' => ['width' => '170'],
            ],

             'remark',

   //         ['attribute' => 'create_time', 'format' => ['date', 'php:Y年m月d日']],

            // 'status',
            ['class' => 'yii\grid\ActionColumn', 'template' => '{view} {update}'],
            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

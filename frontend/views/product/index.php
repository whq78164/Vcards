<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('tbhome', 'Products');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index col-md-10">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('tbhome', 'Create Product'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

 //           'id',
   //         'uid',
     //       'share',
//            'image',
            'factory',
             'name',
    //         'describe',
             'specification',
             'unit',
             'brand',
             'price',
            // 'hot',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

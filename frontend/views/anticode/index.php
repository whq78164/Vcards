<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\AntiCodeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('tbhome', 'Anti Codes');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anti-code-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('tbhome', 'Create Anti Code'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'uid',
            'code',
//            'replyid',
//            'productid',
//             'query_time:datetime',
            'create_time:datetime',
             'prize',
            'clicks',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

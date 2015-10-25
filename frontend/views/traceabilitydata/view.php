<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Traceabilitydata */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('tbhome', 'Traceabilitydatas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="traceabilitydata-view col-md-12">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('tbhome', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('tbhome', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('tbhome', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'uid',
            'productid',
            'traceabilityid',
            'query_time:datetime',
            'clicks',
            'remark',
            'create_time:datetime',
            'status',
        ],
    ]) ?>

</div>
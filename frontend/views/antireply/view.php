<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\AntiReply */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('tbhome', 'Anti Replies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anti-reply-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('tbhome', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?/*= Html::a(Yii::t('tbhome', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('tbhome', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) */?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'uid',
            'tag',
            'success',
            'fail',
  //          'valid_clicks',
            'content:html',
        ],
    ]) ?>

    <?= Html::a(Yii::t('tbhome', '查看防伪页'), ['anti/index', 'replyid'=>$model->id], ['class' => 'btn btn-success pull-right', 'target'=>'_blank']) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\AntiReply */

$this->title = Yii::t('tbhome', 'Update {modelClass}: ', [
    'modelClass' => 'Anti Reply',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('tbhome', 'Anti Replies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('tbhome', 'Update');
?>
<div class="anti-reply-update col-md-8">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

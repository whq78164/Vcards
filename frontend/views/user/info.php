<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Info */
$this->title = Yii::t('tbhome', '详细信息');
//$this->title = Yii::t('tbhome', 'Update {modelClass}: ', [
//        'modelClass' => 'Info',
//    ]) . ' ' . $model->uid;
//$this->params['breadcrumbs'][] = ['label' => Yii::t('tbhome', 'Infos'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->uid, 'url' => ['view', 'id' => $model->uid]];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="info-update">

    <h1><?//= Html::encode($this->title) ?></h1>

    <div class="am-g">


        <div class="am-u-sm-12 am-u-md-8 ">

    <?= $this->render('_form_info', [
        'model' => $model,
    ]) ?>



</div>


</div>



</div>
<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Traceabilitydata */

$this->title = Yii::t('tbhome', 'Create');
$this->params['breadcrumbs'][] = ['label' => Yii::t('tbhome', 'Traceabilitydata'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="traceabilitydata-create col-md-10">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

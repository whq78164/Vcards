<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Product */

$this->title = Yii::t('tbhome', 'Create Product');
$this->params['breadcrumbs'][] = ['label' => Yii::t('tbhome', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-create col-md-10">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\AntiReply */

$this->title = Yii::t('tbhome', 'Create Anti Reply');
$this->params['breadcrumbs'][] = ['label' => Yii::t('tbhome', 'Anti Replies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anti-reply-create col-md-8">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

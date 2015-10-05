<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Label */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="label-form">

    <?php $form = ActiveForm::begin(); ?>

    <?//= $form->field($model, 'uid')->textInput() ?>

    <?= $form->field($model, 'card_label')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'card_value')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('tbhome', 'Create') : Yii::t('tbhome', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

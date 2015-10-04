<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\AntiSetting */
/* @var $form ActiveForm */
?>

<div class="anti-_form_antisetting col-md-8">
    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'title') ?>
        <?//= $form->field($model, 'image') ?>
        <?= $form->field($model, 'api_parameter')->label('对接参数') ?>
        <?= $form->field($model, 'api_select')->label('第三方系统对接') ?>
    
        <div class="form-group">
            <?= Html::submitButton(Yii::t('tbhome', 'Submit'), ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>
</div>
<!-- anti-_form_antisetting -->

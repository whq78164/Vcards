<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\AntiReply */
/* @var $form ActiveForm */
?>
<div class="anti-_form_antireply col-md-8">

    <?php $form = ActiveForm::begin(); ?>

        <?//= $form->field($model, 'uid') ?>
        <?//= $form->field($model, 'tag')->label('标签') ?>
        <?= $form->field($model, 'success')->label('查询成功回复：') ?>
        <?= $form->field($model, 'fail')->label('查询失败回复语：') ?>
        <?//= $form->field($model, 'valid_clicks') ?>
    
        <div class="form-group">
            <?= Html::submitButton(Yii::t('tbhome', 'Submit'), ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- anti-_form_antireply -->

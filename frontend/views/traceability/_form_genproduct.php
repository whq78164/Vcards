<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\AntiCode */
/* @var $form ActiveForm */
?>
<div class="anti-_form_gencode col-md-8">
    <h1><?= Html::encode('批量生成追溯数据') ?></h1>

    <?php $form = ActiveForm::begin(
        ['action'=>['traceability/postgenproduct']]
    ); ?>

        <?//= $form->field($model, 'uid') ?>


        <div class="form-group">
        <label class="control-label">
        生成数量</label>
            <input class="form-control" name="sNum" type="text" placeholder="" value=""  >
    </div>

    <?//= $form->field($model, 'code') ?>
        <?= $form->field($model, 'traceabilityid')->dropDownList(
            $listTraceabilityInfo// ['prompt'=>'选择回复语']
        ) ?>
        <?= $form->field($model, 'productid')->dropDownList(
            $listData// ['prompt'=>'请选择产品']
        )//[1=>'产品1', 2=>'产品2', 3=>'产品3'] ?>
    <?= $form->field($model, 'remark')->textInput() ?>
    
        <div class="form-group">
            <?= Html::submitButton(Yii::t('tbhome', 'Submit'), ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- anti-_form_gencode -->

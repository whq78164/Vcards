<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Site */
/* @var $form ActiveForm */
?>
<div class="col-sm-12 col-md-8">

<div class="">
    <h1><?= Html::encode('站点设置') ?></h1>
    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'admin_user') ?>
        <?= $form->field($model, 'user_password') ?>
        <?= $form->field($model, 'sitetitle') ?>
        <?= $form->field($model, 'company') ?>
        <?= $form->field($model, 'tel') ?>
        <?= $form->field($model, 'qq') ?>
        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'address') ?>
        <?= $form->field($model, 'logo') ?>
        <?= $form->field($model, 'keywords') ?>
        <?= $form->field($model, 'siteurl') ?>
        <?= $form->field($model, 'copyright') ?>
        <?= $form->field($model, 'icp') ?>
        <?= $form->field($model, 'status') ?>
    
        <div class="form-group">
            <?= Html::submitButton(Yii::t('tbhome', 'Submit'), ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- admin-site -->

</div>
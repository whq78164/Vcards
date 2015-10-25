<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Micropage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="micropage-form col-md-10">

    <?php $form = ActiveForm::begin(); ?>

    <?//= $form->field($model, 'uid')->textInput() ?>

    <?= $form->field($model, 'page_title')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'page_content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'page_content')->widget('frontend\assets\UeditorWidget',[
        'serverparam'=>[
            'myuploadpath'=> Yii::getAlias('@web/Uploads/').$model['uid'],
        ],
        'options'=>[
            'focus'=>true,
            'toolbars'=> [
                ['fullscreen', 'source', 'undo', 'redo','paragraph','fontfamily','fontsize', 'justifyleft', 'justifyright', 'justifycenter','link','unlink','emotion', 'simpleupload', 'insertimage', 'map','print', 'spechars','horizontal'],
                ['bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'cleardoc','drafts', 'background', 'preview']
            ],
        ],

        'attributes'=>[
            'style'=>'height:80px'
        ]
    ]); ?>





    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('tbhome', 'Create') : Yii::t('tbhome', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

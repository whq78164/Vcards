<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\AntiReply */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="anti-reply-form">

    <?php $form = ActiveForm::begin(); ?>

    <?//= $form->field($model, 'uid')->textInput() ?>

    <?= $form->field($model, 'tag')->textInput(['placeholder'=>'唯卡微防伪', 'maxlength' => true])->hint('请填写防伪查询页标题，如：友臣肉松饼防伪查询系统') ?>

    <?= $form->field($model, 'success')->textarea()->label('查询成功回复：')->hint('用于返回查询结果，动态变量：[Code](防伪码)、[Clicks](查询次数)、[Price](参考价格)、[Factory](生产厂家)、[Time](上次查询时间)、[Product](产品名称)、[Brand](产品品牌)、[Spec](规格参数)、[Prize](奖品)')//、[CreditName](积分名称)、[CreditNum](积分数)、[Effedate](有效日期)、[Weight](产品重量) ?>
    <?= $form->field($model, 'fail')->textarea()->label('查询失败回复语：') ?>
    <?= $form->field($model, 'content')->widget('frontend\assets\UeditorWidget',[
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

    <?//= $form->field($model, 'valid_clicks')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('tbhome', 'Create') : Yii::t('tbhome', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

        <?= Html::a(Yii::t('tbhome', '查看防伪页'), ['anti/index', 'replyid'=>$model->id], ['class' => 'btn btn-success pull-right', 'target'=>'_blank']) ?>

    </div>
    <?php ActiveForm::end(); ?>

</div>

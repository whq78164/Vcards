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

    <?= $form->field($model, 'tag')->textInput(['placeholder'=>'', 'maxlength' => true])->hint('请填写防伪查询页标题，如：友臣肉松饼防伪查询系统') ?>

    <?= $form->field($model, 'success')->textarea(['rows' => 6])->label('查询成功回复：')->hint('
例：<br/>
您好！您所查询的商品为原装正品！&lt;br/&gt;<br/>
产品名称：[Product]&lt;br/&gt;<br/>
生产厂家：[Factory]&lt;br/&gt;<br/>
品牌：[Brand]&lt;br/&gt;<br/>
之前已被查询：[Clicks]次，&lt;br/&gt;<br/>
上次查询时间：[Time]<br/>
(<strong>注：&lt;br/&gt;为换行符号。中括号为替换变量。防伪码：[Code]，产品规格：[Spec]，奖品名称：[Prize]，产品价格：[Price]， 产品图片：[Image], 产品描述：[Desc], 计量单位：[Unit]</strong>)
') ?>
    <?= $form->field($model, 'fail')->textarea(['rows' => 6])->label('查询失败回复语：')->hint('例：您所查询的记录不存在，请>谨防假冒！') ?>
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

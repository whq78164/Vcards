<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\AntiCode */
/* @var $form ActiveForm */
?>
<div class="anti-_form_gencode col-md-8">
    <h1><?= Html::encode('批量生成防伪码') ?></h1>

    <?php $form = ActiveForm::begin(
        ['action'=>['anti/postgencode']]
    ); ?>

        <?//= $form->field($model, 'uid') ?>
    <div class="form-group">
        <label class="control-label">防伪码长度</label>

            <input class="form-control" name="slen" id="" type="text" value="10">&nbsp;&nbsp;建议8-20位以内
        </div>

        <div class="form-group">
        <label class="control-label">
        生成数量</label>
            <input class="form-control" name="sNum" type="text" placeholder="" value=""  >
    </div>

    <div class="form-group">
        <label class="control-label">
            防伪码前缀</label>
        <input class="form-control" id="sStr" name="sStr" type="text" placeholder="" onkeyup="checkstr(this.value)" >

    </div>

    <div class="form-group" id="txtHint">设置的防伪码前缀</div>

    <div class="form-group">
    <label class="control-label">生成规则：</label>
    <select name="rule" class="form-control">
        <option value=3>前缀+数字+字母
        <option value=2>前缀+字母
        <option value=1>前缀+数字

    </select>
    </div>

    <script type="text/javascript">
          function checkstr(sStr){
              var csrfToken = $('meta[name="csrf-token"]').attr("content");
  //  var dat='';
    $.ajax({
    type: "POST",
    url: "<?=yii\helpers\Url::to(['anti/checkstr'], true)?>",
    data: {
        sStr:sStr,
        _csrf:csrfToken
    },
    dataType: "json",
    success: function(data){
//        document.getElementById("txtHint").innerHTML='<span class="alert alert-success">前缀'+data+'可用</span>';

   if (data >= '1') {
    document.getElementById("txtHint").innerHTML='<span class="alert alert-danger">数据库中已存在相同前缀的数据'+data+'条,请修改</span>';
    }else{
        document.getElementById("txtHint").innerHTML='<span class="alert alert-success">前缀可用</span>';
    }

    }

    });


    }
    </script>


    <?//= $form->field($model, 'code') ?>
        <?= $form->field($model, 'replyid')->dropDownList(
            $listReply// ['prompt'=>'选择回复语']
        ) ?>
        <?= $form->field($model, 'productid')->dropDownList(
            $listData// ['prompt'=>'请选择产品']
        )//[1=>'产品1', 2=>'产品2', 3=>'产品3'] ?>
        <?//= $form->field($model, 'query_time') ?>
        <?//= $form->field($model, 'clicks') ?>
        <?= $form->field($model, 'prize') ?>
    
        <div class="form-group">
            <?= Html::submitButton(Yii::t('tbhome', 'Submit'), ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- anti-_form_gencode -->

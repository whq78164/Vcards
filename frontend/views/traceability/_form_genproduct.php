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







    <div class="panel panel-primary">
        <div class="panel panel-heading">追溯信息：</div>
        <div class="panel panel-body">
            <?= $form->field($model, 'traceabilityid',
                [ 'inputOptions' => [
                    'id'=>"traceabilityid",
                    'class' => 'form-control',
                ]])->dropDownList(
                $listTraceabilityInfo// ['prompt'=>'选择回复语']
            ) ?>


            <div class="text-right " ><label id="txtHint"></label></div>
            <div class="form-group">
                <label class="control-label">
                    追溯编码</label>
                <input class="form-control" id="traceabilityCode" name="traceabilityCode" type="text" placeholder="选填。用于自动搜索追溯信息" onchange="checkstr(this.value)" >

            </div>

        </div>


    </div>







        <?= $form->field($model, 'productid')->dropDownList(
            $listData// ['prompt'=>'请选择产品']
        )//[1=>'产品1', 2=>'产品2', 3=>'产品3'] ?>
    <?= $form->field($model, 'remark')->textInput() ?>
    
        <div class="form-group">
            <?= Html::submitButton(Yii::t('tbhome', 'Submit'), ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- anti-_form_gencode-->


<div class="col-md-4">


</div>


<script type="text/javascript">
    function checkstr(sStr){
        var csrfToken = $('meta[name="csrf-token"]').attr("content");
        $.ajax({
            type: "POST",
            url: "<?=yii\helpers\Url::to(['traceability/checktraceability'], true)?>",
        //    url: "<?=yii\helpers\Url::to(['anti/checkstr'], true)?>",
            data: {
                sStr:sStr,
                _csrf:csrfToken
            },
           // dataType: "json",
            success: function(data){
                if (data <1 ) {
                    document.getElementById("txtHint").innerHTML = '<span class="alert alert-danger" id="txtHint">该追溯编码不存在</span>';
                }else{
                    document.getElementById("traceabilityid").value=data;
                    document.getElementById("txtHint").innerHTML = '<span class="alert alert-success" id="txtHint">追溯信息已选好</span>';
                }


            }

        });


    }

</script>


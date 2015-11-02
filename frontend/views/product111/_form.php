<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var frontend\models\Product $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(['type'=>ActiveForm::TYPE_HORIZONTAL]); echo Form::widget([

    'model' => $model,
    'form' => $form,
    'columns' => 1,
    'attributes' => [

'uid'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter 用户编号...']], 

'share'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Share...']], 

'hot'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter Hot...']], 

'image'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter 图像...', 'maxlength'=>255]], 

'specification'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter 规格参数...', 'maxlength'=>255]], 

'factory'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter 厂家...', 'maxlength'=>30]], 

'name'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter 产品名称...', 'maxlength'=>10]], 

'unit'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter 计量单位...', 'maxlength'=>10]], 

'price'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter 价格(单位：元)...', 'maxlength'=>9]], 

'describe'=>['type'=> Form::INPUT_TEXTAREA, 'options'=>['placeholder'=>'Enter 描述...','rows'=> 6]], 

'brand'=>['type'=> Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter 品牌...', 'maxlength'=>20]], 

    ]


    ]);
    echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']);
    ActiveForm::end(); ?>

</div>

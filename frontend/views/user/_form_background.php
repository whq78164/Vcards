<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

    <div class="am-panel am-panel-default">

        <div class="am-panel-bd">
            <div class="am-g">
            <!--image-->
                <div class="am-u-md-8">
                    <h5><strong>自定义背景</strong></h5>

                    <?php $form = ActiveForm::begin([
                        'id' => "article-form",
                        'enableAjaxValidation' => false,
                        'options' => ['enctype' => 'multipart/form-data'],
                        'action' => $action,
                        'class' =>'am-form',
                    ]) ?>
                        <div class="am-form-group">
                            <!--input type="file" id="user-pic"-->
                            <?= $form->field($image, 'imageFile')->fileInput() ?>
                            <div class="form-group">
                                <?//= Html::submitButton('上传'$model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                                <?=Html::submitButton('上传', ['class' => 'btn btn-primary'])?>
                            </div>
                        </div>
                    <?php ActiveForm::end() ?>
                </div>
            </div>
        </div>
    </div>
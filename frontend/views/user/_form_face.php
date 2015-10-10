<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<div class="am-u-sm-12 am-u-md-4 am-u-md-push-8">
    <div class="am-panel am-panel-default">
        <div class="am-panel-bd">
            <div class="am-g">
                <div class="am-u-md-4">
                    <img class="am-img-circle am-img-thumbnail" src="<?=$info->face_box ? $info->face_box : 'Uploads/default_face.png'?>" alt=""/>
                </div>
                <div class="am-u-md-8">
                    <p>你可以使用<a href="#">gravatar.com</a>提供的头像或者使用本地上传头像。 </p>
                    <?php $form = ActiveForm::begin([
                        'id' => "article-form",
                        'enableAjaxValidation' => false,
                        'options' => ['enctype' => 'multipart/form-data'],
                        'action' => ['user/upload'],
                        'class' =>'am-form',
                    ]) ?>
                        <div class="am-form-group">
                            <!--input type="file" id="user-pic"-->
                            <?= $form->field($face, 'imageFile')->fileInput() ?>
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
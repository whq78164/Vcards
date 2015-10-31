<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

    <div class="am-panel am-panel-default">

        <div class="am-panel-bd">
            <div class="am-u-md-8">
                <img class="am-img-circle am-img-thumbnail" src="<?=$thumImage ? $thumImage : $defaultImage ?>" alt=""/>
            </div>
            <div class="am-g">
            <!--image-->
                <div class="am-u-md-12">
                    <h5><strong><?=isset($title) ? $title : '图片'?></strong></h5>
<?php
if (!isset($model)){
    $modelid=0;
}else{
    $modelid=$model->id;
}
?>

                    <!--p>你可以使用<a href="#">gravatar.com</a>提供的头像或者使用本地上传头像。 </p-->
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
                            <input name="id" type="hidden" value="<?= $modelid ?>">
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
<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Info $qrcode*/
$this->title = Yii::t('tbhome', '个性设置');
//$this->title = Yii::t('tbhome', 'Update {modelClass}: ', [
//        'modelClass' => 'Info',
//    ]) . ' ' . $model->uid;
//$this->params['breadcrumbs'][] = ['label' => Yii::t('tbhome', 'Infos'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => Yii::t('tbhome', '微名片'), 'url' => ['user/vcards']];
$this->params['breadcrumbs'][] = $this->title;

?>



    <h1><?= Html::encode($this->title) ?></h1>



<div class="am-g">


        <div class="am-u-sm-12 am-u-md-4 am-u-md-push-8">



            <div class="am-panel am-panel-default ">
                <a style="" href="<?= yii\helpers\Url::to(['vcards/index', 'uid' => Yii::$app->user->id], true) ?>" target="_blank">
                <button type="button" class="am-btn am-btn-success am-btn-block">

                        我的微名片

                </button>
                </a>
            </div>

            <?php
            if ($role!==10){
            echo $this->render('_form_background', [
                'image' => $image,
                'action' => ['user/postbackground'],
            ]);} ?>


            <div  class="panel panel-primary">
                <div class="panel-heading">背景</div>
                <img id="image_view" class="am-img-thumbnail" src="<?=$model->bg_image?>">
            </div>
            <!--script>
              //  $(document).ready(function(){
 //                   $("bgSelect").onChange(function(){
                    //    document.getElementById("select").value="{$data.bgimg_url}";
  //                      document.getElementById("image_view").src=document.getElementById("image_select").value;
  //                  });

            //    });

            </script-->


        </div>

    <div class="am-u-sm-12 am-u-md-8 am-u-md-pull-4">

        <?= $this->render('_form_setting', [
            'model' => $model,
        ]) ?>
    </div>







</div>


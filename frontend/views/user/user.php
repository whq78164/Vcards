<?php

use yii\helpers\Html;
use yii\grid\GridView;

//use frontend\assets\AmazeAsset;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
//$this->params['breadcrumbs'][] = ['label' => Yii::t('tbhome', '微名片'), 'url' => ['user/vcards']];
$this->title = Yii::t('tbhome', '我的账户');
$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?= Html::encode($this->title) ?></h1>
<hr/>
<div class="am-g">





    <div class="am-u-sm-12 am-u-md-4 am-u-md-push-8">
        <?php
        if ($model->role==100) {
            ?>
        <div class="am-panel am-panel-default">
            <div class="am-panel-bd">

                    <a style="color: inherit" href="<?= yii\helpers\Url::to(['admin/index'], true) ?>" target="_blank">
                        <button type="button" class="am-btn am-btn-warning am-btn-block">
                            系统管理员
                        </button>
                    </a>



                <!--
                <div class="user-info">
                    <p>等级信息</p>
                    <div class="am-progress am-progress-sm">
                        <div class="am-progress-bar" style="width: 60%"></div>
                    </div>
                    <p class="user-info-order">当前等级：<strong>LV8</strong> 活跃天数：<strong>587</strong> 距离下一级别：<strong>160</strong></p>
                </div>
                <div class="user-info">
                    <p>信用信息</p>
                    <div class="am-progress am-progress-sm">
                        <div class="am-progress-bar am-progress-bar-success" style="width: 80%"></div>
                    </div>
                    <p class="user-info-order">信用等级：正常当前 信用积分：<strong>80</strong></p>
                </div>
                -->
            </div>
        </div>

        <?
        }

        ?>

        <?= $this->render('_form_face', [
            'title' => '上传头像',
            'image' => $face,
            'thumImage'=>$info->face_box,
            'defaultImage'=>'Uploads/default_face.jpg',
            'action' => ['user/upload'],
        ]) ?>


        <?= $this->render('_form_face', [
            'title' => '上传微信二维码，方便客户联系您！',
            'image' => $qrcode,
            'thumImage'=>$info->wechat_qrcode,
            'defaultImage'=>'Uploads/default_qrcode.jpg',
            'action' => ['user/wechatqr'],
        ]) ?>




        <div class="am-panel am-panel-default">

            <a style="color: inherit" href="<?= yii\helpers\Url::to(['vcards/index', 'uid' => Yii::$app->user->id], true) ?>" target="_blank">
            <button type="button" class="am-btn am-btn-success am-btn-block">

                        我的微名片

            </button>
            </a>


        </div>


        <!--div class="am-panel am-panel-default">
            <a class="" href="<?=yii\helpers\Url::to(['user/info'],true)?>">
                <button type="button" class="am-btn am-btn-secondary am-btn-block">

                    详细信息

                </button>
            </a>
        </div-->


    </div>



    <div class="am-u-sm-12 am-u-md-8 am-u-md-pull-4">

        <div class="panel panel-primary">
            <div class="panel-heading ">账户信息：</div>
            <div class="panel-body">
        <?= $this->render('_form_user', [
            'model' => $model,
        ]) ?>
                </div>
            </div>




        <div class="panel panel-primary">
            <div class="panel-heading ">名片信息：</div>
            <div class="panel-body">
            <?= $this->render('_form_info', [
                'info' => $info,
            ]) ?>
            </div>

            <!--section data-am-widget="accordion" class="am-accordion am-accordion-gapped" data-am-accordion='{  }'>
                <dl class="am-accordion-item">
                    <dt class="am-accordion-title">
                        <button type="button" class="btn btn-success am-btn-block">
                            <span class="am-icon-plus-square pull-left"></span> <span class="pull-right">完善名片信息</span>
                        </button>
                    </dt>
                    <dd class="am-accordion-bd am-collapse">



                    </dd>

                </dl>
            </section-->
        </div>

    </div>

















</div>
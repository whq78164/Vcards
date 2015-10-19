<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = Yii::t('tbhome', '安全设置');
$setting=$this->title;
//$this->params['breadcrumbs'][] = ['label' => Yii::t('tbhome', 'Users'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->uid]];
$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?= Html::encode($this->title) ?></h1>
<div class="am-g">


    <div class="am-u-sm-12 am-u-md-8 ">
    <form class="am-form am-form-horizontal" method="post" id="form-signup" action="<?=yii\helpers\Url::to(['user/password'])?>" role="form">
        <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken ?>">


        <div class="am-form-group">
            <label for="oldpassowrd" class="am-u-sm-3 am-form-label">
                原密码</label>
            <div class="am-u-sm-9">
                <input name="oldpassword" type="password" id="oldpassword" placeholder="输入原密码" value=""  >

            </div>
        </div>


        <div class="am-form-group">
            <label for="" class="am-u-sm-3 am-form-label">新密码</label>
            <div class="am-u-sm-9">
                <input name="password" type="password" id="" placeholder="" value="">

            </div>
        </div>

        <div class="am-form-group">
            <label for="" class="am-u-sm-3 am-form-label">重复新密码</label>
            <div class="am-u-sm-9">
                <input name="repassword" value="" type="password" id="" placeholder="">
            </div>
        </div>

        <!--div class="am-form-group">
            <label for="user-weibo" class="am-u-sm-3 am-form-label">微博 / Twitter</label>
            <div class="am-u-sm-9">
                <input type="email" id="user-weibo" placeholder="输入你的微博 / Twitter">
            </div>
        </div>

        <div class="am-form-group">
            <label for="user-intro" class="am-u-sm-3 am-form-label">简介 / Intro</label>
            <div class="am-u-sm-9">
                <textarea class="" rows="5" id="user-intro" placeholder="输入个人简介"></textarea>
                <small>250字以内写出你的一生...</small>
            </div>
        </div-->

        <div class="am-form-group">
            <div class="am-u-sm-9 am-u-sm-push-3">
                <button type="submit" class="am-btn am-btn-primary">修改密码</button>
            </div>
        </div>
    </form>

</div>


</div>
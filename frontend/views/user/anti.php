<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Info */
$this->title = Yii::t('tbhome', '产品防伪');

$this->params['breadcrumbs'][] = $this->title;

?>

    <h1><?//= Html::encode($this->title) ?></h1>

    <div class="am-g">


<div class="col-sm-12 col-md-8 ">
    <div class=" panel panel-primary">
<div class="panel-heading ">基本设置：</div>

        <!--a href="<?=yii\helpers\Url::to(['user/antisetting'],true)?>">
<button type="button" class="am-btn am-btn-success am-btn-block">
        防伪设置<span class="am-icon-angle-right pull-right"></span>
</button>
        </a-->

        <a href="<?=yii\helpers\Url::to(['anticode/index'],true)?>">
            <button type="button" class="am-btn am-btn-secondary am-btn-block">
                防伪码管理<span class="am-icon-angle-right pull-right"></span>
            </button>
        </a>

        <a href="<?=yii\helpers\Url::to(['anti/gencode'],true)?>">
            <button type="button" class="am-btn am-btn-success am-btn-block">
                批量生成防伪码<span class="am-icon-angle-right pull-right"></span>
            </button>
        </a>

    </div>
</div>

<div class="col-sm-12 col-md-8 ">
        <div class="panel panel-primary">
            <div class="panel-heading">回复语：</div>

            <a href="<?=yii\helpers\Url::to(['antireply/onereply'],true)?>">
<button type="button" class="am-btn am-btn-warning am-btn-block">

    回复语快捷设置<span class="am-icon-angle-right pull-right"></span>

</button>
            </a>

<?php
$role=Yii::$app->user->identity->role;
if($role==50 || $role==100) {
    ?>
    <a href="<?= yii\helpers\Url::to(['antireply/index'], true) ?>">
        <button type="button" class="am-btn am-btn-secondary am-btn-block">

            回复语管理<span class="am-icon-angle-right pull-right"></span>

        </button>
    </a>
    <?php
}
?>

        </div>
</div>


        <div class="col-sm-12 col-md-8 ">
            <div class="panel panel-primary">
                <div class="panel-heading">产品管理：</div>

                <a href="<?=yii\helpers\Url::to(['product/index'],true)?>">
                    <button type="button" class="am-btn am-btn-secondary am-btn-block">

                        我的产品<span class="am-icon-angle-right pull-right"></span>

                    </button>
                </a>
            </div>
        </div>

</div>




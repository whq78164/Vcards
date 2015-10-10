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

        <a href="<?=yii\helpers\Url::to(['user/antisetting'],true)?>">
<button type="button" class="am-btn am-btn-success am-btn-block">
        防伪设置<span class="am-icon-angle-right pull-right"></span>
</button>
        </a>

        <a href="<?=yii\helpers\Url::to(['anticode/index'],true)?>">
            <button type="button" class="am-btn am-btn-secondary am-btn-block">
                防伪码管理<span class="am-icon-angle-right pull-right"></span>
            </button>
        </a>
    </div>
</div>


<div class="col-sm-12 col-md-8 ">
        <div class="panel panel-primary">
            <div class="panel-heading">回复语：</div>
            <a href="<?=yii\helpers\Url::to(['user/antireply'],true)?>">
<button type="button" class="am-btn am-btn-warning am-btn-block">

    查询回复设置<span class="am-icon-angle-right pull-right"></span>

</button>
            </a>
        </div>
</div>
<div class="col-sm-12 col-md-8">
        <a href="<?=yii\helpers\Url::to(['anti/index', 'uid'=>Yii::$app->user->id],true)?>" target="_blank">
            <?= Html::button('查看', ['class' => 'btn btn-success am-btn-block pull-right' ]) ?>
        </a>
</div>
</div>
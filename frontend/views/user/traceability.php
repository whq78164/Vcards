<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Info */
$this->title = Yii::t('tbhome', '产品质量追溯');

$this->params['breadcrumbs'][] = $this->title;

?>

    <h1><?//= Html::encode($this->title) ?></h1>

    <div class="am-g">


<div class="col-sm-12 col-md-8 ">
    <div class=" panel panel-primary">
<div class="panel-heading ">生产管理：</div>

        <a href="<?=yii\helpers\Url::to(['traceabilitydata/index'],true)?>">
            <button type="button" class="am-btn am-btn-secondary am-btn-block">
                已生成的产品数据<span class="am-icon-angle-right pull-right"></span>
            </button>
        </a>

        <a href="<?=yii\helpers\Url::to(['traceability/genproduct'],true)?>">
            <button type="button" class="am-btn am-btn-success am-btn-block">
                批量生成产品数据<span class="am-icon-angle-right pull-right"></span>
            </button>
        </a>

    </div>
</div>

<div class="col-sm-12 col-md-8 ">
        <div class="panel panel-primary">
            <div class="panel-heading">追溯信息：</div>

    <a href="<?= yii\helpers\Url::to(['traceabilityinfo/index'], true) ?>">
        <button type="button" class="am-btn am-btn-secondary am-btn-block">

            追溯信息管理<span class="am-icon-angle-right pull-right"></span>

        </button>
    </a>

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




<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2015-10-05
 * Time: 10:34
 */

use yii\helpers\Html;

$this->title = Yii::t('tbhome', 'Vcards').'微名片';

$this->params['breadcrumbs'][] = $this->title;

?>

<div class="am-g">


    <div class="col-sm-12 col-md-8 ">
        <div class=" panel panel-primary">

            <div class="panel-heading ">填写名片信息：</div>
            <a href="<?=yii\helpers\Url::to(['user/user'],true)?>">
                <button type="button" class="am-btn am-btn-success am-btn-block">
                    基本信息
                </button>
            </a>

            <a class="" href="<?=yii\helpers\Url::to(['user/info'],true)?>">
                <button type="button" class="am-btn am-btn-secondary am-btn-block">
                    详细信息
                </button>
            </a>

        </div>

    </div>

<br>
    <div class="col-sm-12 col-md-8 ">
        <div class="panel panel-primary">
            <div class="panel-heading">名片功能：</div>
            <a href="<?=yii\helpers\Url::to(['microlink/index'],true)?>">
                <button type="button" class="am-btn am-btn-warning am-btn-block">
                    微链接
                </button>
            </a>
        </div>
    </div>
    <div class="col-sm-12 col-md-8">
        <a href="<?=yii\helpers\Url::to(['vcards/index', 'uid'=>Yii::$app->user->id],true)?>" target="_blank">
            <?= Html::button('查看名片', ['class' => 'btn btn-success am-btn-block pull-right' ]) ?>
        </a>
    </div>
</div>
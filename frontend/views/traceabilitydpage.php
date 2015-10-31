<?php
/* @var $this yii\web\View */
//use frontend\assets\AmazeAsset;
//AmazeAsset::register($this);
use yii\helpers\Html;
use frontend\assets\AppAsset;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-param" content="_csrf">
    <meta name="csrf-token" content="<?= Yii::$app->request->csrfToken ?>">
    <title><?=$traceabilityinfo['label']?></title>

    <style type = "text/css">
        img{max-width:100%;}

    </style>
    <!--body{font-family:"微软雅黑,宋体"; line-height:1.5em; font-size: 18px; }-->
    <?php $this->head() ?>
</head>

<body style="background-color: #eee;padding-top: 40px; padding-bottom: 40px;">
<?php $this->beginBody() ?>
<h3 class="form-signin-heading text-center"><?=$traceabilityinfo['label']?></h3>

<div class="container">

    <br/>

    <div class="alert alert-info" id="ReturnResult">
        <div class="alert alert-<?=$colour?>" >
<?=$queryResult?>
        </div>
        <!--div class="row col-md-10">
        <?//=$antireply->content?>
        </div-->
    </div>
    <label class="pull-right"><?$product->brand?></label>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
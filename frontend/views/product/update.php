<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Product */

$this->title = Yii::t('tbhome', 'Update') . '： ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('tbhome', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('tbhome', 'Update');
?>
<div class="am-g">


    <div class="am-u-sm-12 am-u-md-4 am-u-md-push-8">
        <?= $this->render('/user/_form_face', [
            'title' => '上传产品图片',
            'image' => $image,
            'thumImage'=>$model->image,
            'model'=>$model,
            'defaultImage'=>'Uploads/default_face.jpg',
            'action' => ['product/upload'],
        ]) ?>

    </div>
    <div class="am-u-sm-12 am-u-md-8 am-u-md-pull-4">

        <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_form', [
            'model' => $model,
        //    'image'=>$image,
        ]) ?>

    </div>

</div>
<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SchoolmateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('tbhome', 'User');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="schoolmate-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?//= Html::a(Yii::t('tbhome', 'Create Schoolmate'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //    'id',
            'name',
            //    'sex',
            'email',
       //     'major',
           // 'studentid',
            // 'idcardnum',
            //     'address',
            //    'city',
        //    'job',
            // 'jobtitle',
            // 'honour:ntext',
            // 'worktel',
            // 'hometel',
            'mobile',
            // 'email:email',
            'qq',
            // 'comment:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

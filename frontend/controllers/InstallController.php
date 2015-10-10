<?php

namespace frontend\controllers;

class InstallController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->renderPartial('install');
//header('location:install.php');
    }


}

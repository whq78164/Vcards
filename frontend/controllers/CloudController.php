<?php

namespace frontend\controllers;
use Yii;
use frontend\models\Site;

class CloudController extends \yii\web\Controller
{
    public $enableCsrfValidation=false;
    public function actionIndex()
    {

        $d='欢迎光临！';
        echo $d;
        //return $return;
    }

    public function actionSite()
    {
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            $model=Site::findOne(['ip'=>$_SERVER['REMOTE_ADDR']]);
            $modelnew = new Site();
            $model=$model?$model:$modelnew;

              $model->admin_user=$_POST['admin_user'];
              $model->user_password=$_POST['user_password'];
             $model->sitetitle=$_POST[ 'sitetitle'];
               $model->tel= $_POST['tel'];
             $model->qq=$_POST['qq'];
             $model->email=$_POST['email'];
           $model->siteurl=$_POST['siteurl'];
            $model->ip=$_SERVER['REMOTE_ADDR'];

            if ($model->validate()) {
                if($model->save()){
                    echo '站点设置成功！';
                }else{
                    echo '保存失败，请稍后再试';
                }

            }else{
                echo '注册失败，请检查输入是否正确！';
            }
        }



        if ($_SERVER['REQUEST_METHOD']=='GET'){

            $model=Site::findOne(['ip'=>$_SERVER['REMOTE_ADDR']]);//->attributes;
            if ($model==null){
                $Site['admin_user']='请注册用户';
                $Site['user_password']='';
                $Site['sitetitle']='未注册';
                $Site['tel']='';
                $Site['qq']='798904845';
                $Site['email']='';
                $Site['siteurl']='';
                $Site['ip']='';
                $model=$Site;
            }else{
                $model=Site::findOne(['ip'=>$_SERVER['REMOTE_ADDR']])->attributes;
            }
            return json_encode($model);

        }




    }












}




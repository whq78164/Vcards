<?php

namespace frontend\controllers;
use Yii;
use frontend\models\Site;

class CloudController extends \yii\web\Controller
{
    public $enableCsrfValidation=false;
    public function actionIndex()
    {


        if ($_SERVER['REQUEST_METHOD']=='GET'){

            $model=Site::findOne(['ip'=>$_SERVER['REMOTE_ADDR']]);//->attributes;
            if ($model==null){
                $Site['role']='免费用户(未注册，不可使用)';
                $Site['content']='首次使用，请设置您的站点信息！站点注册成功后，将成为免费用户。可供免费试用和学习。未经许可的商业运营，我们不保证商品的稳定性，由此造成的运营数据丢失等可能风险，请自行承担。对于未注册的站点，或擅自更改程序文件内容，进行商业运营的侵权行为，我们保留追究违法责任的权利。如需商业化运营，请购买商业授权。我们将提供永久更新服务和长期的售后技术支持。QQ：798904845。';
                $Site['sitetitle']='唯卡微名片用户管理中心';
                $Site['tel']='15980016080';
                $Site['qq']='798904845';
                $Site['email']='798904845@qq.cm';
                $Site['siteurl']='http://www.vcards.top';
                $Site['ip']='';
                $model=$Site;
            }else{
                $model=Site::findOne(['ip'=>$_SERVER['REMOTE_ADDR']])->attributes;
                $model['content']='您使用的产品为正版商业授权！唯卡微名片系列产品，自动为每一位注册用户创建产品宣传和快速通讯的微网页，是以微名片CRM客户管理系统为核心，以满足特殊需求，定制扩展的开源项目。如需大规模商业化运营，建议使用VPS云主机，我们提供专业的Linux服务器安全环境配置(免费名额有限)。使用过程有任何疑问或建议。请随时反馈！如需特殊定制服务和程序设计开发，请咨询！QQ：798904845。';
                switch($model['status']){
                    case 10 :
                        $model['role']='免费用户';
                        $model['content']='感谢您支持正版软件！您的产品已可以正常使用。如需商业化运营，建议购买授权，终身使用，售后支持，运营安全有保障！唯卡微名片系列产品，自动为每一位注册用户创建产品宣传和快速通讯的微网页，是以微名片CRM客户管理系统为核心，以满足特殊需求，定制扩展的开源项目。使用过程有任何疑问或建议。请随时反馈！如需特殊定制服务和程序设计开发，请咨询！QQ：798904845。';
                        break;
                    case 20 : $model['role']='微名片商业用户';
                        break;
                    case 30 : $model['role']='微防伪(基础)商业用户';
                        break;
                    case 40 : $model['role']='微防伪(高级)商业用户';
                        break;
                }


            }
            return json_encode($model);

        }


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
            $model->copyright=$_POST['copyright'];
            $model->icp=$_POST['icp'];
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
                $Site['sitetitle']='唯卡微名片用户管理系统';
                $Site['tel']='';
                $Site['qq']='798904845';
                $Site['email']='';
                $Site['siteurl']='';
                $Site['copyright']='唯卡微名片© by 通宝科技 2015';
                $Site['icp']='';
                $Site['ip']='';
                $model=$Site;
            }else{
                $model=Site::findOne(['ip'=>$_SERVER['REMOTE_ADDR']])->attributes;
            }
            return json_encode($model);

        }




    }




}




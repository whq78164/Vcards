<?php

use yii\helpers\Html;
use yii\grid\GridView;
//use frontend\assets\AmazeAsset;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = Yii::t('tbhome', '我的账户');
$this->params['breadcrumbs'][] = $this->title;
?>
<!--h3><?//= Html::encode($this->title) ?></h3-->
<hr/>
<div class="am-g">

    <div class="am-u-sm-12 am-u-md-4 am-u-md-push-8">
        <div class="am-panel am-panel-default">
            <div class="am-panel-bd">
                <div class="am-g">
                    <div class="am-u-md-4">
                        <img class="am-img-circle am-img-thumbnail" src="http://s.amazeui.org/media/i/demos/bw-2014-06-19.jpg?imageView/1/w/200/h/200/q/80" alt=""/>
                    </div>
                    <div class="am-u-md-8">
                        <p>你可以使用<a href="#">gravatar.com</a>提供的头像或者使用本地上传头像。 </p>
                        <form class="am-form">
                            <div class="am-form-group">
                                <input type="file" id="user-pic">
                                <p class="am-form-help">请选择要上传的文件...</p>
                                <button type="button" class="am-btn am-btn-primary am-btn-xs">保存</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="am-panel am-panel-default">
            <div class="am-panel-bd">
                <div class="user-info">
                    <p>等级信息</p>
                    <div class="am-progress am-progress-sm">
                        <div class="am-progress-bar" style="width: 60%"></div>
                    </div>
                    <p class="user-info-order">当前等级：<strong>LV8</strong> 活跃天数：<strong>587</strong> 距离下一级别：<strong>160</strong></p>
                </div>
                <div class="user-info">
                    <p>信用信息</p>
                    <div class="am-progress am-progress-sm">
                        <div class="am-progress-bar am-progress-bar-success" style="width: 80%"></div>
                    </div>
                    <p class="user-info-order">信用等级：正常当前 信用积分：<strong>80</strong></p>
                </div>
            </div>
        </div>

    </div>

    <div class="am-u-sm-12 am-u-md-8 am-u-md-pull-4">


        <?= $this->render('_form_user', [
            'model' => $model,
        ]) ?>

        <!--section data-am-widget="accordion" class="am-accordion am-accordion-gapped" data-am-accordion='{  }'>


                        <dl class="am-accordion-item ">
                <dt class="am- am-accordion-title">
                    <span class="am-icon-credit-card am-success am-icon-md"></span>让生命去等候，去等候，去等候，去等候
                </dt>
                <dd class="am-accordion-bd am-collapse ">
                    <!-- 规避 Collapase 处理有 padding 的折叠内容计算计算有误问题， 加一个容器 ->
                    <div class="am-accordion-content">
                        走在忠孝东路 <br/> 徘徊在茫然中 <br/> 在我的人生旅途 <br/> 选择了多少错误 <br/> 我在睡梦中惊醒 <br/> 感叹悔言无尽 <br/> 恨我不能说服自己 <br/> 接受一切教训 <br/> 让生命去等候 <br/> 等候下一个漂流 <br/> 让生命去等候 <br/>等候下一个伤口
                    </div>
                </dd>
            </dl>

            <dl class="am-accordion-item">
                <!--class= am-active 代表折叠组件为展开状态->
                <dt class="am-accordion-title">
                    就这样恣意的活着
                </dt>
                <dd class="am-accordion-bd am-collapse"><!-- am-in-->
                    <!-- 规避 Collapase 处理有 padding 的折叠内容计算计算有误问题， 加一个容器 ->
                    <div class="am-accordion-content">
                        置身人群中 <br/> 你只需要被淹没 享受 沉默 <br/> 退到人群后 <br/> 你只需给予双手 微笑 等候
                    </div>
                </dd>
            </dl>

        </section-->




    </div>

















</div>
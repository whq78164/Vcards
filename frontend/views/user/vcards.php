<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2015-10-05
 * Time: 10:34
 */

use yii\helpers\Html;
use frontend\assets\Mobile_Detect;
$mobile=new Mobile_Detect();
$this->title = '名片制作';
//$this->params['breadcrumbs'][] = ['label' => Yii::t('tbhome', '名片首页'), 'url' => ['vcards/index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="am-g">

        <div class="am-u-sm-12 col-lg-5">
        <div class=" panel panel-primary">
            <div class="panel-heading ">名片设置：</div>

            <section data-am-widget="accordion" class="am-accordion am-accordion-gapped" data-am-accordion='{  }'>
                <dl class="am-accordion-item ">
                    <dt class="am-accordion-title ">

                        <a href="<?=yii\helpers\Url::to(['user/user'],true)?>">
                            <button type="button" class="am-btn am-btn-success am-btn-block">
                                名片信息
                            </button>
                        </a>
                    </dt>
                </dl>
            </section>

            <!--section data-am-widget="accordion" class="am-accordion am-accordion-gapped" data-am-accordion='{  }'>
                <dl class="am-accordion-item ">
                    <dt class="am-accordion-title ">
                        <a class="" href="<?=yii\helpers\Url::to(['user/info'],true)?>">
                            <button type="button" class="am-btn am-btn-secondary am-btn-block">
                                详细信息
                            </button>
                        </a>
                    </dt>
                </dl>
            </section-->

            <section data-am-widget="accordion" class="am-accordion am-accordion-gapped" data-am-accordion='{  }'>
                <dl class="am-accordion-item ">
                    <dt class="am-accordion-title ">
                        <a class="" href="<?=yii\helpers\Url::to(['user/specialsetting'],true)?>">
                            <button type="button" class="am-btn am-btn-secondary am-btn-block">
                                个性化设置
                            </button>
                        </a>
                    </dt>
                </dl>
            </section>

        </div>
        </div>

        <div class="am-u-sm-12 col-lg-5 ">
        <div class="panel panel-primary">
            <div class="panel-heading">名片功能：</div>

            <section data-am-widget="accordion" class="am-accordion am-accordion-gapped" data-am-accordion='{  }'>
                <dl class="am-accordion-item ">
                    <dt class="am-accordion-title ">
                        <a href="<?=yii\helpers\Url::to(['microlink/index'],true)?>">
                            <button type="button" class="am-btn am-btn-warning am-btn-block">
                                微链接
                            </button>
                        </a>
                    </dt>
                </dl>
            </section>

            <section data-am-widget="accordion" class="am-accordion am-accordion-gapped" data-am-accordion='{  }'>
                <dl class="am-accordion-item ">
                    <dt class="am-accordion-title ">
                        <?= Html::a(Yii::t('tbhome', '微单页'), ['micropage/onepage'], ['class' => 'btn btn-success btn-block']) ?>
                    </dt>
                </dl>
            </section>
        </div>
        </div>
<?
if (!$mobile->isMobile()){
?>
    <div class="am-u-sm-12 col-lg-2">
        <div class=" panel panel-primary">

            <div class="panel-heading ">
                我的微名片
            </div>
            <a href="<?=yii\helpers\Url::to(['vcards/index', 'uid'=>Yii::$app->user->id],true)?>" target="_blank">
                <img class="am-img-circle am-img-thumbnail" src="http://www.vcards.top/qrcode.php?value=<?=yii\helpers\Url::to(['vcards/index', 'uid'=>Yii::$app->user->id], true)?>">
            </a>

        </div>

    </div>

<?
}else{
?>
    <div class="am-u-sm-12 col-lg-2">
        <a style="color: inherit" href="<?= yii\helpers\Url::to(['vcards/index', 'uid' => Yii::$app->user->id], true) ?>" target="_blank">
            <button type="button" class="am-btn am-btn-success am-btn-block">

                我的微名片

            </button>
        </a>
        <br/>

    </div>


<?
}?>

</div>


<?php
if ($role!==10) {
    ?>
    <div class="col-sm-12 col-md-5">
        <div class="panel panel-primary">
            <div class="panel-heading ">VIP专享：</div>

            <section data-am-widget="accordion" class="am-accordion am-accordion-gapped" data-am-accordion='{  }'>
                <dl class="am-accordion-item">
                    <dt class="am-accordion-title">
                        <button type="button" class="btn btn-primary am-btn-block">
                            <span class="am-icon-plus-square pull-left"></span> <span class="pull-right">更多</span>
                        </button>
                    </dt>
                    <dd class="am-accordion-bd am-collapse">

                        <a href="<?= yii\helpers\Url::to(['label/index'], true) ?>">
                            <button type="button" class="am-btn am-btn-secondary am-btn-block">
                                新增字段<span class="am-icon-angle-right pull-right"></span>
                            </button>
                        </a>

                        <a href="<?= yii\helpers\Url::to(['micropage/index'], true) ?>">
                            <button type="button" class="am-btn am-btn-warning am-btn-block">
                                微网页<span class="am-icon-angle-right pull-right"></span>
                            </button>
                        </a>

                    </dd>

                </dl>
                <!--dl class="am-accordion-item">
                    <dt class="am-accordion-title">
                        让生命去等候，去等候，去等候，去等候
                    </dt>
                    <dd class="am-accordion-bd am-collapse ">

                        <div class="am-accordion-content">
                            走在忠孝东路 <br/> 徘徊在茫然中 <br/> 在我的人生旅途 <br/> 选择了多少错误 <br/> 我在睡梦中惊醒 <br/> 感叹悔言无尽 <br/> 恨我不能说服自己 <br/> 接受一切教训 <br/> 让生命去等候 <br/> 等候下一个漂流 <br/> 让生命去等候 <br/>等候下一个伤口
                        </div>
                    </dd>
                </dl-->
            </section>

        </div>
    </div>
    <?
}
?>







<!--
<button
    type="button"
    class="am-btn am-btn-primary"
    data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0, width: 400, height: 225}">
    Modal
</button>


<button
    type="button"
    class="am-btn am-btn-primary"
    data-am-modal="{target: '#my-modal3'}">
    My Modal
</button>


<div class="am-modal am-modal-no-btn" tabindex="-1" id="doc-modal-1">
    <div class="am-modal-dialog">
        <div class="am-modal-hd">Modal 标题
            <a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
        </div>
        <div class="am-modal-bd">
            <iframe src="<?=yii\helpers\Url::to(['user/user'],true)?>" name="myframe" width=100% height='800' scrolling="Yes" frameborder="0" id="myframe" border="0" ></iframe>本 Modal 无法通过遮罩层关闭。
        </div>
    </div>
</div>



<div class="am-modal am-modal-prompt" tabindex="-1" id="my-modal3">
    <div class="am-modal-dialog">
        <div class="am-modal-hd">Amaze UI</div>
        <div class="am-modal-bd">
            来来来，吐槽点啥吧
            <input type="text" class="am-modal-prompt-input">
        </div>
        <div class="am-modal-footer">
            <span class="am-modal-btn" data-am-modal-cancel>取消</span>
            <span class="am-modal-btn" data-am-modal-confirm>提交</span>
        </div>
    </div>
</div>

-->


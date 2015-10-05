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

            <section data-am-widget="accordion" class="am-accordion am-accordion-gapped" data-am-accordion='{  }'>
                <dl class="am-accordion-item ">
                    <dt class="am-accordion-title ">

                        <a href="<?=yii\helpers\Url::to(['user/user'],true)?>">
                            <button type="button" class="am-btn am-btn-success am-btn-block">
                                基本信息
                            </button>
                        </a>
                    </dt>
                </dl>
            </section>

            <section data-am-widget="accordion" class="am-accordion am-accordion-gapped" data-am-accordion='{  }'>
                <dl class="am-accordion-item ">
                    <dt class="am-accordion-title ">
                        <a class="" href="<?=yii\helpers\Url::to(['user/info'],true)?>">
                            <button type="button" class="am-btn am-btn-secondary am-btn-block">
                                详细信息
                            </button>
                        </a>
                    </dt>
                </dl>
            </section>

        </div>

    </div>

<br>
    <div class="col-sm-12 col-md-8 ">
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
                    <dt class="am-accordion-title">
                        <a href="<?=yii\helpers\Url::to(['micropage/index'],true)?>">
                            <button type="button" class="am-btn am-btn-secondary am-btn-block">
                                微网页
                            </button>
                        </a>
                    </dt>

                </dl>

            </section>


            <section data-am-widget="accordion" class="am-accordion am-accordion-gapped" data-am-accordion='{  }'>
                <dl class="am-accordion-item">
                    <dt class="am-accordion-title">
                        <button type="button" class="am-btn am-btn-success am-btn-block">
                            <span class="am-icon-plus-square pull-left"></span>  <span class="pull-right">更多</span>
                        </button>



                    </dt>
                    <dd class="am-accordion-bd am-collapse ">
                        <a href="<?=yii\helpers\Url::to(['label/index'],true)?>">
                            <button type="button" class="am-btn am-btn-block">
                                新字段
                            </button>
                        </a>
                                       </dd>

                </dl>

            </section>




        </div>
    </div>
    <div class="col-sm-12 col-md-8">
        <a href="<?=yii\helpers\Url::to(['vcards/index', 'uid'=>Yii::$app->user->id],true)?>" target="_blank">
            <?= Html::button('查看名片', ['class' => 'btn btn-primary am-btn-block pull-right' ]) ?>
        </a>
    </div>
</div>


<!--section data-am-widget="accordion" class="am-accordion am-accordion-gapped" data-am-accordion='{  }'>
    <dl class="am-accordion-item am-active">
        <dt class="am-accordion-title">
            就这样恣意的活着
        </dt>
        <dd class="am-accordion-bd am-collapse am-in">

            <div class="am-accordion-content">
             展开
            </div>
        </dd>
    </dl>
    <dl class="am-accordion-item">
        <dt class="am-accordion-title">
            让生命去等候，去等候，去等候，去等候
        </dt>
        <dd class="am-accordion-bd am-collapse ">

            <div class="am-accordion-content">
                走在忠孝东路 <br/> 徘徊在茫然中 <br/> 在我的人生旅途 <br/> 选择了多少错误 <br/> 我在睡梦中惊醒 <br/> 感叹悔言无尽 <br/> 恨我不能说服自己 <br/> 接受一切教训 <br/> 让生命去等候 <br/> 等候下一个漂流 <br/> 让生命去等候 <br/>等候下一个伤口
            </div>
        </dd>
    </dl>
    <dl class="am-accordion-item">
        <dt class="am-accordion-title">
            我就这样告别山下的家
        </dt>
        <dd class="am-accordion-bd am-collapse ">
            <div class="am-accordion-content">
                我就这样告别山下的家，我实在不愿轻易让眼泪留下。我以为我并不差不会害怕，我就这样自己照顾自己长大。我不想因为现实把头低下，我以为我并不差能学会虚假。怎样才能够看穿面具里的谎话？别让我的真心散的像沙。如果有一天我变得更复杂，还能不能唱出歌声里的那幅画？
            </div>
        </dd>
    </dl>
</section-->
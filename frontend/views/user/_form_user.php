<?php

?>

<form class="am-form am-form-horizontal" method="post" id="form-signup" action="<?=yii\helpers\Url::to(['user/user'])?>" role="form">
    <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken ?>">

    <div class="am-form-group">
        <label for="user-name" class="am-u-sm-3 am-form-label">
            姓名 / Name</label>
        <div class="am-u-sm-9">
            <input name="User[name]" type="text" id="user-name" placeholder="姓名 / Name" value="<?=$model->name?>"  >
            <small>输入姓名，让我们记住您!
            </small>
        </div>
    </div>

    <div class="am-form-group">
        <label for="user-email" class="am-u-sm-3 am-form-label">电子邮件 / Email</label>
        <div class="am-u-sm-9">
            <input name="User[email]" type="email" id="user-email" placeholder="输入你的电子邮件 / Email" value="<?=$model->email?>">
            <small>邮箱你懂得...</small>
        </div>
    </div>

    <div class="am-form-group">
        <label for="user-phone" class="am-u-sm-3 am-form-label">手机 / mobile</label>
        <div class="am-u-sm-9">
            <input name="User[mobile]" value="<?=$model['mobile']?>" type="text" id="user-phone" placeholder="输入你的手机号码 / Telephone">
        </div>
    </div>

    <div class="am-form-group">
        <label for="user-QQ" class="am-u-sm-3 am-form-label">QQ</label>
        <div class="am-u-sm-9">
            <input name="User[qq]" value="<?=$model['qq']?>" type="text" id="user-QQ" placeholder="输入你的QQ号码">
        </div>
    </div>

    <!--div class="am-form-group">
        <label for="user-weibo" class="am-u-sm-3 am-form-label">微博 / Twitter</label>
        <div class="am-u-sm-9">
            <input type="email" id="user-weibo" placeholder="输入你的微博 / Twitter">
        </div>
    </div>

    <div class="am-form-group">
        <label for="user-intro" class="am-u-sm-3 am-form-label">简介 / Intro</label>
        <div class="am-u-sm-9">
            <textarea class="" rows="5" id="user-intro" placeholder="输入个人简介"></textarea>
            <small>250字以内写出你的一生...</small>
        </div>
    </div-->

    <div class="am-form-group">
        <div class="am-u-sm-9 am-u-sm-push-3">
            <button type="submit" class="am-btn am-btn-primary">保存修改</button>
        </div>
    </div>
</form>
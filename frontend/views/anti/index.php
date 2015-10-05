<?php
/* @var $this yii\web\View */
//use frontend\assets\AmazeAsset;
//AmazeAsset::register($this);
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?=$info->unit?></title>
    <!-- Bootstrap core CSS -->
    <link href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
    <script Charset="UTF-8" type="text/javascript">

        function fwcx() {
//var FWcode = document.getElementById('FWcode').value;
            var FWcode = $("#FWcode").val();
//var FWuid = document.getElementById('FWuid').value;
            var FWuid = $("#FWuid").val();
            $.post("<?=yii\helpers\Url::to(['anti/antiquery'],true)?>", {FWcode: FWcode, FWuid: FWuid}, function(data,status){
                document.getElementById('ReturnResult').innerHTML = data;
            });
        };
    </script>

    <style type = "text/css">
        img{max-width:100%;}

    </style>
    <!--body{font-family:"微软雅黑,宋体"; line-height:1.5em; font-size: 18px; }-->
</head>

<body style="background-color: #eee;padding-top: 40px; padding-bottom: 40px;">
<h3 class="form-signin-heading text-center"><?=$info->unit?></h3>

<div class="container">

    <br/>
    <label class="pull-left">请输入防伪编码：</label>
    <input type="text" class="form-control" placeholder="请输入防伪密码" name="FWcode" id="FWcode">
    <br>
    <INPUT type="hidden" id="FWuid" name="FWuid" value="<?=$info->uid?>" />
    <button id="button" class="btn btn-lg btn-primary btn-block"  onclick="fwcx()">点击验证</button>
    <br>
    <div class="alert alert-info" id="ReturnResult">这里显示您的查询结果</div>
    <label class="pull-right"><?=$info->unit?></label>
</div> <!-- /container -->

<SCRIPT>
    /*!
     * IE10 viewport hack for Surface/desktop Windows 8 bug
     * Copyright 2014 Twitter, Inc.
     * Licensed under the Creative Commons Attribution 3.0 Unported License. For
     * details, see http://creativecommons.org/licenses/by/3.0/.
     */

    // See the Getting Started docs for more information:
    // http://getbootstrap.com/getting-started/#support-ie10-width
    (function () {
        'use strict';
        if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
            var msViewportStyle = document.createElement('style')
            msViewportStyle.appendChild(
                document.createTextNode(
                    '@-ms-viewport{width:auto!important}'
                )
            )
            document.querySelector('head').appendChild(msViewportStyle)
        }
    })();

</SCRIPT>

</body>
</html>
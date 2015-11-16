<?php
/* @var $this yii\web\View */
//use frontend\assets\AmazeAsset;
//AmazeAsset::register($this);
use yii\helpers\Html;
use frontend\assets\AppAsset;
//use yii\bootstrap\Nav;
//use yii\bootstrap\NavBar;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-param" content="_csrf">
    <meta name="csrf-token" content="<?= Yii::$app->request->csrfToken ?>">
    <title><?=$antireply->tag?></title>
    <!--script src="js/jquery-1.11.0.min.js"></script-->
    <script src="http://apps.bdimg.com/libs/jquery/1.11.1/jquery.min.js"></script>

    <style type = "text/css">
        img{max-width:100%;}






        html,body,p,h1,h2,h3,h4,h5,h6,form,input,textarea,select,button,fieldset,legend,img,ul,ol,li,dl,dt,dd,th,td,pre,blockquote{margin:0;padding:0}
        html{height:100%;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;-webkit-font-smoothing:antialiased}
        body{background: #f0f0f0;color:#000;}
        body,button,input,select,textarea,h2,h3,h4,h5,h6{font:14px 'Hiragino Sans GB', 'Microsoft Yahei', '微软雅黑', '宋体', \5b8b\4f53, Tahoma, Arial}
        img,fieldset{border:0;vertical-align:middle}
        input{padding:0;margin:0;outline:none;}
        a{text-decoration:none;color:#4c4c4c;}
        a:hover{text-decoration:none;}
        ul,li,ol{list-style:none}
        img{max-width:100%;}
        .clear{clear:both;height:0;line-height:0;font-size:0;visibility:hidden;overflow:hidden}
        .clearfix:after{visibility: hidden;display: block;font-size: 0;content: " ";clear: both;height: 0;zoom:1;}
        .l{float:left;}.r{float:right;}
        /*reset样式重置*/
        .btn3{position:fixed;
            z-index:3;
            bottom:0px;
            border-top:1px solid #b3b3b3;
            background:#e6e6e6;
            width:100%;
            text-align:center;
            box-sizing:border-box;
            -webkit-box-sizing:border-box;}
        .menu{position:relative;
            float:left;
            width:33.33%;
            height:50px;
            line-height:50px;
            background:#fff;
            border-right:1px solid #ebebeb;
            box-sizing:border-box;
            -webkit-box-sizing:border-box;}
        .menu:last-child{border-right:none;}
        .new-sub{position:absolute;
            bottom:60px;
            z-index:10;
            width:100%;
            padding: 0px 10px;
            background: #fff;
            box-sizing:border-box;
            -webkit-box-sizing:border-box;
            border: 1px solid #EEEEEE;
            border-radius: 5px;
            display:none;}
        .new-sub li{width: 100%;
            background:#fff;
            float:none;
            box-sizing:border-box;
            -webkit-box-sizing:border-box;
            border-top:1px solid #f2f2f2;}
        .new-sub li a{display:block;
            height:50px;
            line-height:50px;
            text-align:left;
            background:#fff;
            color:#333;
            border:none;
            text-align:center;
            font-size:16px;}
        .sanjiao{position:absolute;bottom:5px;right:5px;width:0;height:0;border:5px solid transparent;border-right:5px solid #000;border-bottom:5px solid #000;opacity:.5;}
        .bt-name{font-size:16px;color:#000;}
        .bt-name a{display:block;font-size:16px;color:#000;}
        .new-sub .tiggle{
            width:0px;
            height:0px;
            position:absolute;
            left:50%;
            margin-left:-10px;
            bottom:-9px;
            border-top:10px solid #EEEEEE;
            border-left:10px solid transparent;
            border-right:10px solid transparent;
            z-index:10;
        }
        .new-sub .innertiggle{
            width:0px;
            height:0px;
            position:absolute;
            left:50%;
            margin-left:-9px;
            bottom:-8px;
            border-top:9px solid white;
            border-left:9px solid transparent;
            border-right:9px solid transparent;
            z-index:11;
        }









    </style>
    <!--body{font-family:"微软雅黑,宋体"; line-height:1.5em; font-size: 18px; }-->
    <?php $this->head() ?>
</head>

<body style="background-color: #eee;padding-top: 40px; padding-bottom: 40px;">
<?php $this->beginBody() ?>

<div class="container">
    <?=$queryResult?>
    <!--div class="alert alert-info" id="ReturnResult">
        <div class="alert alert-<?//=$colour?>" >

        </div>

    </div-->
    <!--label class="pull-right"><?//=$product->brand?></label-->
</div>

<!--nav class="navbar navbar-default navbar-fixed-bottom"->
    <div class="container">
        <ul class="nav nav-tabs text-center navbar-fixed-bottom">
            <li style="float: left;" class="">
                <a class="glyphicon glyphicon-qrcode" href="#"></a>
            </li>
            <li style="float: right;" class=" text-t">
                <a class="glyphicon glyphicon-ok" href="#"></a>
            </li>
            <li class="dropdown" >
                <a style="" class=" dropdown-toggle glyphicon glyphicon-list" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">

                </a>
                <ul class="dropdown-menu">
                    <li role="presentation" ><a class="glyphicon glyphicon-cloud" href="#"></a></li>
                    <li role="presentation"><a href="#">Profile</a></li>
                </ul>
            </li>

        </ul>
    </div-->



<!--↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓3列菜单开始↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓-->
<div class="btn3 clearfix">

    <div class="menu">
        <div class="bt-name"><a href="">微网站</a></div>
    </div><!--menu-->


    <div class="menu">
        <div class="bt-name">二</div>
        <div class="sanjiao"></div>
        <div class="new-sub">
            <ul >
                <li><a href="javascript:;">二、第一个</a></li>
                <li><a href="javascript:;" >二、第二个特特</a></li>
            </ul>
            <div class="tiggle"></div>
            <div class="innertiggle"></div>
        </div>

    </div><!--menu-->


    <div class="menu" >
        <div class="bt-name">第三个菜单</div>
        <div class="sanjiao"></div>
        <div  class="new-sub">
            <ul>
                <li><a href="javascript:;">三、第一个</a></li>
                <li><a href="javascript:;" >三第二个发才</a></li>
                <li><a href="javascript:;" >三、第三个</a></li>
            </ul>
            <div class="tiggle"></div>
            <div class="innertiggle"></div>
        </div>
    </div><!--menu-->

</div><!--btn3-->
<!--↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑3列菜单end↑↑↑↑↑↑↑↑↑↑↑↑↑↑-->
<script type="text/javascript">
    //弹出垂直菜单
    $(".menu").click(function() {
        if ($(this).hasClass("cura")) {
            $(this).children(".new-sub").hide(); //当前菜单下的二级菜单隐藏
            $(".menu").removeClass("cura"); //同一级的菜单项
        } else {
            $(".menu").removeClass("cura"); //移除所有的样式
            $(this).addClass("cura"); //给当前菜单添加特定样式
            $(".menu").children(".new-sub").slideUp("fast"); //隐藏所有的二级菜单
            $(this).children(".new-sub").slideDown("fast"); //展示当前的二级菜单
        }
    });
</script>




<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
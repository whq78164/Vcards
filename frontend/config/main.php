<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
//    'language' => 'zh-CN',
    //'charset' => 'UTF-8',

    'components' => [
        'aliases' => [
            'class'=>'phpqrcode',  //如果不定义该类，将会报错。值就是在phpqrcode.php中定义的命名空间
            '@phpqrcode' => '@vendor/tbhome/phpqrcode',  //@phpqrcode 就是在phpqrcode.php中定义的命名空间，@vendor/phpqrcode 为该类的路径
        ],

 //       'db' => require(__DIR__ . '/db.php'),
        'i18n' => [
            'translations' => [
                'tbhome' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    /* 'basePath' => '@app/messages',
                      'sourceLanguage' => 'zh-CN',*/
                    'basePath' => '@vendor/tbhome/messages',
                    'fileMap' => [
                        'app' => 'tbhome.php',
                        'app/error' => 'error.php',
                    ],
                ],
            ],
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            //'enableSession' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
      //      'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.163.com',  //每种邮箱的host配置不一样
                'username' => 'whq78164@163.com',
                'password' => '123456',
                'port' => '25',
                'encryption' => 'tls',//加密
            ],

            'messageConfig'=>[
                'charset'=>'UTF-8',
                'from'=>['whq78164@163.com'=>'admin',
                    '798904845@qq.com' => 'supportEmail',
                ]
            ],

        ],

    ],
    'params' => $params,
];

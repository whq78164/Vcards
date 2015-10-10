<?php

$config = [
 /*
    'modules' => [
        'schoolmate' => [
            'class' => 'frontend\modules\schoolmate\schoolmateModule',
        ],
        'api' => [
            'class' => 'frontend\modules\api\apiModule',
        ],
    ],
    */
    'components' => [
        'db' => require(__DIR__ . '/db.php'),
      /*  'we7db' => [
            'class' => 'yii\db\Connection',
            'dsn'=>'mysql:host=rds26izw8p54t86315s7public.mysql.rds.aliyuncs.com;dbname=vcardswe7',
            'username' => 'vcards',
            'password' => 'gg770880',
            'charset' => 'utf8',
        ],*/
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'xpWfUhbMG32BI2FV-SDukLcc4f0v6jA7',
        ],
    ],
];

if (!YII_ENV_PROD) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;

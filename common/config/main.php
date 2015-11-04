<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    //add modules 'datecontrol' into your 'modules' section in common/config/main
    'modules' => [
        'datecontrol' =>  [
            'class' => 'kartik\datecontrol\Module',

            // format settings for displaying each date attribute
            'displaySettings' => [
                'date' => 'd-m-Y',
                'time' => 'H:i:s A',
                'datetime' => 'd-m-Y H:i:s A',
            ],

            // format settings for saving each date attribute
            'saveSettings' => [
                'date' => 'Y-m-d',
                'time' => 'H:i:s',
                'datetime' => 'Y-m-d H:i:s',
            ],

            // automatically use kartik\widgets for each of the above formats
            'autoWidget' => true,

        ]
    ],

    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];

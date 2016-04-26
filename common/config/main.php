<?php
setlocale(LC_ALL, 'ru_RU.UTF8');
return [
    'language' => 'ru',
    'timeZone' => 'Europe/Moscow',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'accent' => [
            'class' => 'common\components\AccentComponent'
        ]
    ],
];

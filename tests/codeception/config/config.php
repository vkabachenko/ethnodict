<?php
/**
 * Application configuration shared by all applications and test types
 */
return [
    'language' => 'en-US',
    'controllerMap' => [
        'fakedb' => [
            'class' => 'tests\codeception\common\_support\FakeDbController',
            'countWords' => 25,
            'countAccents' => 2,
            'countVariants' => 2,
        ]
    ],
    'components' => [
        'db' => [
            'dsn' => 'mysql:host=localhost;dbname=etnodict_tests',
        ],
        'mailer' => [
            'useFileTransport' => true,
        ],
        'urlManager' => [
            'showScriptName' => true,
        ],
    ],
];

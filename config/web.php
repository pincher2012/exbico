<?php

declare(strict_types=1);
/* @var codemix\yii2confload\Config $this */
$config = [
    'id' => 'basic',
    'aliases' => [
        '@bower' => '/var/www/vendor/bower-asset',
        '@npm' => '/var/www/vendor/npm-asset',
    ],
    'basePath' => '/var/www/html',
    'bootstrap' => ['log'],
    'vendorPath' => '/var/www/vendor',
    'components' => [
        'cache' => self::env('DISABLE_CACHE', false) ?
            'yii\caching\DummyCache' :
            [
            'class' => 'yii\caching\ApcCache',
            'useApcu' => true,
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => self::env('DB_DSN', 'mysql:host=db;dbname=web'),
            'username' => self::env('DB_USER', 'web'),
            'password' => self::env('DB_PASSWORD', 'web'),
            'charset' => 'utf8',
            'tablePrefix' => '',
        ],
        'log' => [
            'traceLevel' => self::env('YII_TRACELEVEL', 0),
            'targets' => [
                [
                    'class' => 'codemix\streamlog\Target',
                    'url' => 'file:///tmp/yii-stdout',
                    'logVars' => [],
                ],
            ],
        ],
        'request' => [
            'cookieValidationKey' => self::env('COOKIE_VALIDATION_KEY', null, !YII_ENV_TEST),
            'trustedHosts' => explode(',', self::env('PROXY_HOST', '192.168.0.0/24')),
        ],
        'session' => [
            'name' => 'MYAPPSID',
            'savePath' => '@app/var/sessions',
            'timeout' => 1440,
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
    ],
];

return $config;

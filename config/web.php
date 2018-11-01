<?php

declare(strict_types=1);

/* @var codemix\yii2confload\Config $this */

use app\models\User;

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
            'dsn' => self::env('DB_DSN', 'mysql:host=db;dbname=exbico'),
            'username' => self::env('DB_USER', 'web'),
            'password' => self::env('DB_PASSWORD', 'web'),
            'charset' => 'utf8',
            'tablePrefix' => '',
            'enableSchemaCache' => true,
            'schemaCacheDuration' => 0,
            'schemaCache' => 'cache',
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
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'response' => [
            'class' => 'yii\web\Response',
            'on beforeSend' => function ($event) {
                $response = $event->sender;
                $data = ['success' => $response->isSuccessful];
                if ($response->isSuccessful) {
                    $data['data'] = $response->data;
                } else {
                    $data['error'] = $response->data;
                }

                $response->data = $data;
            },
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
        'user' => [
            'identityClass' => User::class,
            'enableSession' => false,
            'loginUrl' => null,
        ]
    ],
    'params' => [],
];

return $config;

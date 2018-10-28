<?php

define('YII_ENV', 'test');
defined('YII_DEBUG') or define('YII_DEBUG', true);
require_once '/var/www/vendor/yiisoft/yii2/Yii.php';
require '/var/www/vendor/autoload.php';

Yii::setAlias('@app', '/var/www/html');

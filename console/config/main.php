<?php

$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'console\controllers',
    'modules' => [],
    'components' => [
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=loctogo',
            'username' => 'root',
            'password' => '1234',
            'charset' => 'utf8',
        ],
        'resque' => [ 
            'class' => '\resque\RResque', 
            'server' => 'localhost',     // Redis server address
            'port' => '6379',            // Redis server port
            'database' => 0,             // Redis database number
            'password' => '',            // Redis password auth, set to '' or null when no auth needed
        ], 
        
    ],
    
    'params' => $params,
];

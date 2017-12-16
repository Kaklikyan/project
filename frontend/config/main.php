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
    'components' => [
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            //'suffix' => '.html',
            'rules' => [
                '' => 'site/index',
                'main/matches/<key:\w+>' => 'main/matches',

                [
                    'pattern' => 'players/<id:\d+>',
                    'route' => 'players/',
                    'defaults' => ['id' => ''],
                ],
                [
                    'pattern' => 'teams/<id:\d+>',
                    'route' => 'teams/',
                    'defaults' => ['id' => ''],
                ],
                [
                    'pattern' => 'fields/<id:\d+>',
                    'route' => 'fields/',
                    'defaults' => ['id' => ''],
                ],

                [
                    'pattern' => 'other/teams/<id:\d+>',
                    'route' => 'other/teams/',
                    'defaults' => ['id' => ''],
                ],

                [
                    'pattern' => 'other/players/<id:\d+>',
                    'route' => 'other/players/',
                    'defaults' => ['id' => ''],
                ],

                'challenge/refuse/<id:\d+>/<whom:\d+>' => 'challenge/refuse',
                'player-transfer/cancel/<id:\d+>' => 'player-transfer/cancel',
                'challenge/confirm/<id:\d+>/<whom:\d+>' => 'challenge/confirm',
                'challenge/cancel/<id:\d+>' => 'challenge/cancel',


                '<action>'=>'site/<action>',
            ],
        ],
        'assetManager' => [
            'basePath' => '@webroot/assets',
            'baseUrl' => '@web/assets'
        ],
        'request' => [
            'baseUrl' => ''
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => '/site/login',
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'params' => $params,
];

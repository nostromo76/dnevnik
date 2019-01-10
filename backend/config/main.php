<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'user/update/<id:\d+>' => 'user/update',
                'user/view/<id:\d+>' => 'user/view',
                'raspored/update/<id:\d+>' => 'raspored/update',
                'raspored/view/<id:\d+>' => 'raspored/view',
                'predmet/update/<id:\d+>' => 'predmet/update',
                'predmet/view/<id:\d+>' => 'predmet/view',
                'odeljenje/update/<id:\d+>' => 'odeljenje/update',
                'odeljenje/view/<id:\d+>' => 'odeljenje/view',
                'ucitelj/update/<id:\d+>' => 'ucitelj/update',
                'ucitelj/view/<id:\d+>' => 'ucitelj/view',
                'obavestenja/update/<id:\d+>' => 'obavestenja/update',
                'obavestenja/view/<id:\d+>' => 'obavestenja/view',

            ],
        ],

    ],
    'params' => $params,
];

<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],    
	'modules' => [

        'roditelj' => [

            'class' => 'frontend\modules\roditelj\Module',

        ],
        'ucitelj' => [

            'class' => 'frontend\modules\ucitelj\Module',

        ],
        'poruke' => [

            'class' => 'frontend\modules\poruke\Module',

        ],
        'direktor' => [

            'class' => 'frontend\modules\direktor\module',

        ],

    ],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'enableCsrfValidation' => false,

        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
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
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'site/index/<id:\d+>' => 'site/index',
                'ucitelj/ucitelj/view/<id:\d+>' => 'ucitelj/ucitelj/view',
            ],
        ],

    ],
    'params' => $params,
];

<?php

$config = [
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
<<<<<<< HEAD
            'cookieValidationKey' => 'ceHNOxe9sHcB5riKrN75WubmpLe-ZGAs',
=======
            'cookieValidationKey' => 'C4b1JHtOWALwfud_Bykr5HzGHX_sEQ2q',
>>>>>>> cbf23d110377217a1007d47d29ec72714b42bafe
        ],
    ],
];

if (!YII_ENV_TEST) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;

<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'name' => 'ChaskiRoute',
    'language' => 'es',
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
            'enableAutoLogin' => false,
            //'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'hati-session',
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
        'authManager' => [
            'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\DbManager'
        ],
        'urlManagerFrontEnd' => [
            'class' => 'yii\web\urlManager',
            'baseUrl' => '/project-hati/frontend/web',
            'enablePrettyUrl' => true,
            'showScriptName' => false
        ],

    ],
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'site/login',
            'site/error',
            'site/logout',
            'site/index',
            'site/forgot',
            'site/signup',
            'cab-salida/*',
            'admin/*',
            'debug/*',
            'gii/*'
        ]
    ],
    'modules' => [
        'i18n' => Zelenin\yii\modules\I18n\Module::className(),
        'admin' => [
            'class' => 'mdm\admin\Module','layout' => 'left-menu',
            'mainLayout' => '@app/views/layouts/main.php',
        ]
    ],
    'params' => $params,
];

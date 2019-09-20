<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'name' => 'ChaskiRoute',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'language' => 'es',
    'bootstrap' => ['log'],
    'modules' => [
        'sap' => [
            'class' => 'backend\modules\sap\Module',
        ],
        'markdown' => [
            'class' => 'kartik\markdown\Module',
            'previewAction' => '/markdown/parse/preview',
            'customConversion' => [
                '<table>' => '<table class="table table-bordered table-striped">'
            ],
            'smartyPants' => true
        ],
        'i18n' => Zelenin\yii\modules\I18n\Module::className(),
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => false,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
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
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            //'rule' => [],
        ],

    ],
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'site/request-password-reset',
            'site/signup',
            'site/reset-password',
            'site/error',
            'site/logout',
            'debug/*',
            'gii/*'

        ]
    ],
    'params' => $params,
];

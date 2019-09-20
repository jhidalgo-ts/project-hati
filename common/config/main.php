<?php

use \kartik\datecontrol\Module;

return [
    'id' => 'project-hati',
    'name' => 'Project Hati',
    'language' => 'es',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'urlManager' => [
            'showScriptName' => false,
            'enablePrettyUrl' => true
        ],
        'urlManagerFrontEnd' =>[
            'class' => 'yii\web\urlManager',
            'baseUrl' => '/frontend/web',
            'enablePrettyUrl' => false,
            'showScriptName' => false,
        ],
        'assetManager' => [
            'bundles' => [
                'dmstr\web\AdminLteAsset' => [
                    'skin' => 'skin-blue'
                ]
            ]
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager'
        ],
        'i18n' => [
            'class' => Zelenin\yii\modules\I18n\components\I18N::className(),
            'languages' => ['es', 'en', 'fr', 'it', 'de', 'jp']
        ],
    ],
    'modules' =>[
        'gridview' => [
            'class' => '\kartik\admin\Module'
        ],
        'admin' => [
            'class' => 'mdm\admin\Module',
            //'layout' => 'left-menu',
            'mainLayout' => '@app/views/layouts/main-admin.php',
        ],
        'datecontrol' => [
            'class' => 'kartik\datecontrol\Module',
            'displaySettings' => [
                Module::FORMAT_DATE => 'yyyy-MM-dd',
                Module::FORMAT_TIME => 'hh:mm:ss a',
                Module::FORMAT_DATETIME => 'yyyy-MM-dd hh:mm:ss a'
            ],
            'displayTimezone' => 'America/Bogota',
            'saveTimezone' => 'UTC',
            'autoWidget' => true,
            'widgetSettings' => [
                Module::FORMAT_DATE => [
                    'class' => 'yii\jui\DatePicker',
                    'options' => [
                        'dateFormat' => 'php:Y-M-d',
                        'options' => ['class' => 'form-control']
                    ]
                ]
            ]
        ],
        'pdfjs' => [
            'class' => '\yii2assets\pdfjs\Module',
        ],
    ],
];

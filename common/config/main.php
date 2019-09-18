<?php

use \kartik\datecontrol\Module;

return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'id' => 'project-hati',
    'name' => 'Project Hati',
    'language' => 'en',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'urlManager' => [
            'showScriptName' => false,
            'enablePrettyUrl' => true
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
            'layout' => 'left-menu',
            'mainLayout' => '@app/views/layouts/main.php',
        ],
        'datecontrol' => [
            'class' => 'kartik\datecontrol\Module',
            'displaySettings' => [
                Module::FORMAT_DATE => 'yyyy-MM-dd',
                Module::FORMAT_TIME => 'hh:mm:ss a',
                Module::FORMAT_DATETIME => 'yyyy-MM-dd hh:mm:ss a'
            ],
            'widgetSettings' => [
                Module::FORMAT_DATE => [
                    'class' => 'yii\jui\DatePicker',
                    'options' => [
                        'dateFormat' => 'php:Y-M-d',
                        'options' => ['class' => 'form-control']
                    ]
                ]
            ]
        ]
    ]
];

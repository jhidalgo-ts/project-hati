<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'pgsql:host=10.100.1.131;dbname=hati',
            'username' => 'postgres',
            'password' => 'postgres',
            'charset' => 'utf8',
            'schemaMap' => [
                'pgsql' => [
                    'class' => 'yii\db\pgsql\Schema',
                    'defaultSchema' => 'core' //specify your schema here, public is the default schema
                ]
            ],
            'on afterOpen' => function ($event) {
                $event->sender->createCommand("SET search_path TO core;")->execute();
            },
        ],
        'dbSap' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'pgsql:host=10.100.1.131;dbname=chaskiroute',
            'username' => 'postgres',
            'password' => 'postgres',
            'charset' => 'utf8',
            'schemaMap' => [
                'pgsql' => [
                    'class' => 'yii\db\pgsql\Schema',
                    'defaultSchema' => 'sap' //specify your schema here, public is the default schema
                ]
            ],
            'on afterOpen' => function ($event) {
                $event->sender->createCommand("SET search_path TO core;")->execute();
            },
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'mail.kleintours.com.ec',
                'username' => 'sistema11@kleintours.com.ec',
                'password' => '?@GnqQXcwvo$',
                'port' => '587',
            ],
            'useFileTransport' => false,
        ],
    ],
];

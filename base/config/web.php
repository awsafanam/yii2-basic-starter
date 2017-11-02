<?php
$dbFile = __DIR__ . '/db.php';
if(file_exists($dbFile)) {
    $db = require($dbFile);
} else {
    $db = [
        'class' => 'yii\\db\\Connection',
        'dsn' => 'mysql:host=localhost;dbname=NAME',
        'username' => 'USER',
        'password' => 'PASS',
        'charset' => 'utf8',
    ];
}
$mailFile = __DIR__ . '/mail.php';
if(file_exists($mailFile)) {
    $mailer = require($mailFile);
} else {
    $mailer = [
        'class' => 'yii\swiftmailer\Mailer',
        'useFileTransport' => true,
    ];
}
$paramFile = __DIR__ . '/params.php';
if(file_exists($paramFile)) {
    $params = require($paramFile);
} else {
    $params = [
        'adminEmail' => 'admin@example.com',
        'installed' => false,
    ];
}
// Main Config File
$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'awsaf\installer\SiteBootstrap'],
    'modules' => [
        'user' => [
            'class' => 'dektrium\user\Module',
            'enableUnconfirmedLogin' => true,
            'confirmWithin' => 21600,
            'cost' => 12,
            'admins' => ['admin'],
            'controllerMap' => [
                'admin' => [
                    'class' => 'dektrium\user\controllers\AdminController',
                    'layout' => '@app/views/layouts/admin',
                ]
            ],
        ],
        'admin' => [
            'class' => 'mdm\admin\Module',
            'layout' => 'left-menu',
            'mainLayout'=>'@app/views/layouts/admin.php',
            'navbar'=> [
                ['label' => 'Home', 'url' => ['/site/index']],
            ],
            'controllerMap' => [
                'assignment' => [
                    'class' => 'mdm\admin\controllers\AssignmentController',
                    'userClassName' => 'app\models\User',
                    'idField' => 'id',
                ],
            ],
        ],
        'installer' => [
            'class' => 'awsaf\installer\InstallerModule'
        ],
    ],
    'components' => [
        'request' => [
            'cookieValidationKey' => '5N1PIKoUpGLdoqJnbhNt4g3aBGBUWVzn',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => $mailer,
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
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
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@dektrium/user/views' => '@app/views/user'
                ],
            ],
        ],
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ]
    ],
    'params' => $params
];
if($params['installed']) {
    $config['as access'] = [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'site/*',
            'admin/*',
            'gii/*',
            'installer/*',
            'user/*',
        ]
    ];
}
if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;

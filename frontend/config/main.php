<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

Yii::setAlias('@test', '@frontend/test');

return [
    'id' => 'app-my-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'defaultRoute' => 'main', // открытие контроллера по умолчанию

    'modules' => [
        'main' => [
            'class' => 'app\modules\main\Module',
        ],
    ],

    'components' => [

        'mail' => [
            'class'            => 'zyx\phpmailer\Mailer',
            'viewPath'         => '@common/mail',
            'useFileTransport' => false,
            'config'           => [
                'mailer'     => 'smtp',
                'host'       => 'smtp.yandex.ru',
                'port'       => '465',
                'smtpsecure' => 'ssl',
                'smtpauth'   => true,
                'username'   => 'skulines@mail.ru', // здесь для каждого прописываются свои настройки
                'password'   => '13079999', // ну и пароль соответственно
                'ishtml'     => true,
                'charset'    => 'UTF-8',
            ],
        ],

        'common' => [
            'class' => 'frontend\components\Common',
        ],

        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
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
            //'enableStrictParsing' => true,
            /*
            'rules' => [
                [
                    'pattern' => '<controller>/<action>',
                    'route'   => '<controller>/<action>',
                    'suffix'  => '.html'
                ],
            ]
            */
        ],
    ],
    'params' => $params,
];

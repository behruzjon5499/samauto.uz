<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
	'homeUrl' => '/admin',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
            'cookieValidationKey' => 'lghrltjo56o4i56ha^ws%r@h3khk755$%415rw',
//            'baseUrl' => '/admin',
        ],
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@backend/views' => '@backend/views/lte'
                ],
            ],
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
                'login' => 'site/login',
                'get-cities' => 'admin/site/get-cities',

                //'site-test' => 'site/site-test',
                //'company-users/<type>' => 'company-users/index',

                'pages/files/<type>' => 'admin/pages/files',

                //'logout' => 'site/logout',
			    //'managers'=> 'user/managers',
                '<controller:\w+>' => '<controller>/index',
				'<controller>/<action>' => '<controller>/<action>',
            ],
        ],
        'assetManager' => [
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'sourcePath' => null,
                    'js' => ['js/jquery_1.11.3.js'] // тут путь до Вашего экземпляра jquery
                    //'js' => ['js/jquery-3.1.1.min.js'], // тут путь до Вашего экземпляра jquery
                ],
            ],
        ],
    ],
    'params' => $params,
    'language' => 'ru-RU'
];

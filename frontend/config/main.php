<?php
$params = array_merge(
//    require(DIR . '/../../common/config/params.php'),
//    require(DIR . '/../../common/config/params-local.php'),
//    require(DIR . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'homeUrl' => '',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'modules' => [
        'cabinet' => ['class' => 'app\modules\cabinet\Module'],
    ],
    'components' => [
        'session' => [
            'class' => 'yii\web\Session',
            //'cookieParams' => ['httponly' => true, 'lifetime' => 3600*24*30*12],
            //'timeout' => 3600*24*30*12,
            'useCookies' => true,
            'name' => 'advanced-frontend',
        ],
        /*'cache' => [
            'class' => 'yii\caching\FileCache',
            'keyPrefix' => 'mycache', // уникальный префикс ключей кэша
        ],*/
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'baseUrl' => '',
            'enableCookieValidation' => false,
            'enableCsrfValidation' => true,
            'cookieValidationKey' => 'jksddbdf87TUyg@W^&@#8kjssd',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],

        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    //'levels' => ['error', 'warning'],
                    'levels' => ['error'],
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

                '' => 'site/index',

                'lang/<lang>' => 'site/lang',

                'get-history' => 'site/get-history',
                'get-partners' => 'site/get-partners',

                // 'captcha' => 'site/captcha',
                'get-user' => 'site/get-user',
                'search' => 'site/search',

                /*'about/faq/<type>' => 'site/faq',
                'about/faq'=>'site/faq', */

                // доступные actions в siteController
                '<action:(about|contacts|localization)>' => 'site/<action>',
                /*'about/mission/<id>' => 'site/mission',
                'about/missions' => 'site/missions',
                'about/documents' => 'site/documents',
                'about/history' => 'site/history',
                'about/leadership' => 'site/leadership',
                'about/vacancy' => 'site/vacancy',*/
                'about/<action>' => 'site/<action>',
                'about/<action>/<id>' => 'site/<action>',

                'get-workers' => 'site/get-workers',
                'get-vacancy' => 'site/get-vacancy',


                'localization/<link>/<sub_link>'=> 'site/localization-item',
                'get-localization' => 'site/get-localization',
                'search-localization' => 'site/search-localization',
                'get-companies' => 'site/get-companies',

                'symbols'=>'site/symbols',

                'news' => 'news/index',
                'news/archive' => 'news/archive',
                'news/get-archive' => 'news/get-archive', // ajax
                'news/<link>' => 'news/item',

                'actions' => '/site/actions',
                'action-item/<link>' => '/site/action-item',

				// new
				'services' => 'site/services',
				'services/warranty'=>'site/warranty',
				'services/centres'=>'site/centres',
				'services/spare-parts'=>'site/spare-parts',
				'services/faq' =>'site/services-faq',
				'localization/about' => 'site/localization-about',


                'dillers/region/<region_id>'=>'dillers/region',
                'dillers/<id>/service'=>'dillers/item',

                //'download-file/<id:\d+>' => 'site/download-file',

                'partnership'=> 'site/partnership',

                'products/<link>'=> 'products/item',
                'service/option/<item>/<link>'=> 'service/option',
                'service/<link>'=> 'service/list',
                'service/<link>/<item>'=> 'service/item',
                'send-comment' => 'products/send-comment',
                'send-phone' => 'site/send-phone',

                // 'catalog' => 'products/index', // товары
                'projects' => 'projects/index', // список индивидуальных проектов
                'projects/<link>' => 'projects/item', // индивидуальный проект

                'sitemap' => 'site/sitemap',

                //'actions/<link>' => 'actions/action', // любая акция

                // '<action:\w+>/<id:\d+>' => 'site/<action>',
                '<controller>/<action>/<id>' => '<controller>/<action>',
                '<controller>/<action>' => '<controller>/<action>',
                '<controller>' => '<controller>/index',
            ],
        ],
    ],
    'params' => $params,
];



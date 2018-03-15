<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
   // 'language'=>'ru',
   // 'sourceLanguage' =>'en',
    'modules' => [
        'settings' => [
            'class' => 'backend\modules\settings\Settings',
        ],
        'gridview' =>[
            'class' =>'\kartik\grid\Module',  
        ],
        'webshell'=>[
            'class' => 'samdark\webshell\Module',
            // 'yiiScript' => Yii::getAlias('@root'). '/yii', // adjust path to point to your ./yii script
           // 'allowedIPs' => ['127.0.0.1', '::1', '192.168.0.2'],
//            'checkAccessCallback' => function (\yii\base\Action $action) {
//                // return true if access is granted or false otherwise
//                return true;
//            }
        ],
        'git' => [
            'class' => '\markmarco16\git\Module',
           // 'gitDir' => 'D:/Program Files/Git/' , //Ruta Adsoluta
            'gitDir' =>'D:/wamp/www/ApiModule/ApiM/',
            'datetimeFormat' => '%Y-%m-%d %H:%M:%S', //Opcional
            'subjectMaxLength' => 100, //Opcional
        ],
    ],
    'components' => [
//        'i18n'=>[
//            'translations' =>[
//                'app' => [                    
//                    'class' =>'yii\i18n\PhpMessageSource',
//                    //'basePath' =>'@app/messages',
//                    'sourceLanuage' =>'en',
//                    'fileMap'=>[
//                        'app'=>'app.php',
//                        'app/error' => 'error.php',
//                    ],
//                ],
//                
//            ],
//        ],
        'request' => [
            'csrfParam' => '_csrf-backend',
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
        'MyComponent' => [
            'class' => 'backend\components\MyComponent'
        ],
        //add email 
        'mailer' =>[
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' =>false,
        ],
        //add rbac config
        'authManager' =>[
            'class' => 'yii\rbac\DbManager',
            'defaultRoles' =>['guest'],
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
//        'assetManager' =>[
//            'yii\web\JqueryAsset' => [
//                'sourcePath' => null,
//                'js' => []
//            ],
//        ]
    ],
//    'as beforeRequest' =>[
//        'class' => 'backend\components\CheckIfLoggedIn'
//    ],
    'params' => $params,
];

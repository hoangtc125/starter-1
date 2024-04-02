<?php

use app\src\controller\AccountController;
use app\src\core\Application;
use app\src\controller\TestController;

require_once dirname(__DIR__) . '/src/utils/constant.php';
require_once dirname(__DIR__) . '/vendor/autoload.php';
$dotenv = \Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();
$config = [
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ],
    'jwt' => [
        'algorithm' => $_ENV['JWT_ALGORITHM'],
        'key' => $_ENV['JWT_KEY'],
    ]
];

$app = new Application(dirname(__DIR__), $config);

$app->router->get('/api/test/public', [TestController::class, 'test_public']);
$app->router->get('/api/test/private', [TestController::class, 'test_private']);
$app->router->get('/api/account/test', [AccountController::class, 'get_account']);

$app->run();

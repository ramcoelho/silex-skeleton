<?php

use Skel\Controller\IndexController;
use Skel\Service\ControllerProvider,
    Skel\Service\RouterProvider,
    Skel\Service\DBProvider;
use Silex\Application;
use Silex\Provider\ServiceControllerServiceProvider;

define("APP_ROOT", dirname(__DIR__));
chdir(APP_ROOT);

require "vendor/autoload.php";

$app = new Application();
$app['debug'] = true;
$app['pdo.host'] = 'pgsql:host=localhost;dbname=your_db_name';
$app['pdo.user'] = 'your_pgsql_user';
$app['pdo.pass'] = 'you_pgsql_passwd';

$app->register(new ServiceControllerServiceProvider());

$app->register(new ControllerProvider());
$app->register(new RouterProvider());
$app->register(new DBProvider());

$app->run();

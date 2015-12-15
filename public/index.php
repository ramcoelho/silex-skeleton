<?php

use Controller\IndexController;
use Service\Provider\ControllerProvider,
    Service\Provider\RouterProvider,
    Service\Provider\ConfigProvider,
    Service\Provider\DBProvider;
use Silex\Application;
use Silex\Provider\ServiceControllerServiceProvider;

define("APP_ROOT", dirname(__DIR__));
define("CONFIG_FILE", 'private/config.json');
chdir(APP_ROOT);

require "vendor/autoload.php";

$app = new Application();

$app->register(new ServiceControllerServiceProvider());
$app->register(new ControllerProvider());
$app->register(new RouterProvider());
$app->register(new ConfigProvider());
$app->register(new DBProvider());

if (isset($app['config']->debug))
    $app['debug'] = $app['config']->debug;

$app->run();

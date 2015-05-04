<?php

use Skel\Controller\IndexController;
use Skel\Service\ControllerProvider,
    Skel\Service\RouterProvider;
use Silex\Application;
use Silex\Provider\ServiceControllerServiceProvider;

define("APP_ROOT", dirname(__DIR__));
chdir(APP_ROOT);

require "vendor/autoload.php";

$app = new Application();
$app['debug'] = true;
$app->register(new ServiceControllerServiceProvider());

$app->register(new ControllerProvider());
$app->register(new RouterProvider());

$app->run();

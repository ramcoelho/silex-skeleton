<?php
namespace Skel\Service;

use Silex\Application;
use Silex\ServiceProviderInterface;
use Symfony\Component\HttpFoundation\Response;

class RouterProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app->get('/', "controller.index:index");
    }

    public function boot(Application $app)
    {
    }
}
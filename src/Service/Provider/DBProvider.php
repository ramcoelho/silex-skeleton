<?php

namespace Service\Provider;

use \PDO;
use Silex\Application;
use Silex\ServiceProviderInterface;

class DBProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $config = $app['config'];

        foreach ($config->db as $name => $parameters) {
            $app['db.' . $name] = $app->share(function() use ($parameters) {
                $conn = new PDO(
                    $parameters->host,
                    $parameters->user,
                    $parameters->password
                );
                $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); 
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $conn;
            });
        }
    }

    public function boot(Application $app)
    {
    }
}

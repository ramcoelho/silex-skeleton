<?php
namespace Service;

use \PDO;
use Silex\Application;
use Silex\ServiceProviderInterface;

class DBProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['db'] = $app->share(function() use ($app) {
            $conn = new PDO(
            	$app['pdo.host'],
            	$app['pdo.user'],
            	$app['pdo.pass']
            );
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); 
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $conn;
        });
    }

    public function boot(Application $app)
    {
    }
}

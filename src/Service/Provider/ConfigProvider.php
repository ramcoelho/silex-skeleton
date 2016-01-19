<?php

namespace Service\Provider;

use \PDO;
use Silex\Application;
use Silex\ServiceProviderInterface;

class ConfigProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['config'] = $app->share(function() use ($app) {
            if (! file_exists(CONFIG_FILE))
                throw new \Exception(sprintf(
                    "File not found: %s. Use private/config.json.dist as template",
                    CONFIG_FILE
                ), 500);

            $json = file_get_contents(CONFIG_FILE);
            $config = json_decode($json);

            if (\JSON_ERROR_NONE != json_last_error())
                throw new \Exception(sprintf(
                    "Error parsing config file: %s",
                    json_last_error_msg()
                ), 500);

            return $config;
        });
    }

    public function boot(Application $app)
    {
    }
}

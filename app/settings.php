<?php

declare(strict_types=1);

use App\Application\Settings\Settings;
use App\Application\Settings\SettingsInterface;
use DI\ContainerBuilder;
use Monolog\Logger;

return function (ContainerBuilder $containerBuilder) {

    // Global Settings Object
    $containerBuilder->addDefinitions([
        SettingsInterface::class => function () {
            return new Settings([
                'displayErrorDetails' => true, // Should be set to false in production
                'logError'            => false,
                'logErrorDetails'     => false,
                'logger' => [
                    'name' => 'slim-app',
                    'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
                    'level' => Logger::DEBUG,
                ],
                // postgres://fl0user:0wYvtHL4fzsZ@ep-spring-hall-35501515.eu-central-1.aws.neon.tech:5432/modattire-bd?sslmode=require
                'db' => [
                    'driver' => 'pgsql',
                    'host' => 'ep-spring-hall-35501515.eu-central-1.aws.neon.tech',
                    'port' => '5432',
                    'database' => 'modattire-bd',
                    'username' => 'fl0user',
                    'password' => '0wYvtHL4fzsZ',
                    'charset' => 'utf8',
                    'collation' => 'utf8_unicode_ci',
                    'prefix' => '',
                    'schema' => 'public',
                    'sslmode' => 'require',
                ],
            ]);
        }
    ]);
};

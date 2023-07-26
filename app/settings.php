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
                // TODO: Sacar las variables de conexion a la base de datos a .env
                'db' => [
                     'driver' => 'mysql',
                     'host' => 'localhost',
                     'database' => 'Baloncesto',
                     'username' => 'root',
                     'password' => 'toor',
                     'charset' => 'utf8mb4',
                     'collation' => 'utf8mb4_unicode_ci',
                ],
            ]);
        }
    ]);
};

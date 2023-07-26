<?php

declare(strict_types=1);

use App\Domain\User\UserRepository;
use App\Infrastructure\Persistence\User\InMemoryUserRepository;
use DI\ContainerBuilder;

use App\Domain\Player\PlayerRepository;
use App\Infrastructure\Persistence\Player\EloquentPlayerRepository;
use App\Application\Settings\SettingsInterface;
use Illuminate\Database\Capsule\Manager as Capsule;
use Psr\Container\ContainerInterface;


return function (ContainerBuilder $containerBuilder) {
    // Here we map our UserRepository interface to its in memory implementation
    $containerBuilder->addDefinitions([
        UserRepository::class => \DI\autowire(InMemoryUserRepository::class),
        PlayerRepository::class => function (ContainerInterface $c) {
            $settings = $c->get(SettingsInterface::class);
            $dbSettings = $settings->get('db');

            $capsule = new Capsule;
            $capsule->addConnection($dbSettings);
            $capsule->setAsGlobal();
            $capsule->bootEloquent();

            return new EloquentPlayerRepository($dbSettings);
        },
    ]);
};

<?php

declare(strict_types=1);

use App\Application\Actions\User\ListUsersAction;
use App\Application\Actions\User\ViewUserAction;

use App\Application\Actions\Player\ListPlayersAction;
use App\Application\Actions\Player\ViewPlayerAction;
use App\Application\Actions\Player\CreatePlayerAction;
use App\Application\Actions\Player\UpdatePlayerAction;
use App\Application\Actions\Player\DeletePlayerAction;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write('Hello world!');
        return $response;
    });

    $app->group('/users', function (Group $group) {
        $group->get('', ListUsersAction::class);
        $group->get('/{id}', ViewUserAction::class);
    });

    //  get players group from database
    $app->group('/players', function (Group $group) {
        $group->get('', ListPlayersAction::class);
        $group->get('/{id}', ViewPlayerAction::class);
        $group->post('', CreatePlayerAction::class);
        $group->put('/{id}', UpdatePlayerAction::class);
        $group->delete('/{id}', DeletePlayerAction::class);
    });

    // TODO: Ejemplo sin usar Eloquent
    /*
    $app->get('/db-test', function (Request $request, Response $response) {
        $db = $this->get(PDO::class);
        $sth = $db->prepare("SELECT * FROM Jugadores ORDER BY nombre ASC");
        $sth->execute();
        $data = $sth->fetchAll(PDO::FETCH_ASSOC);
        $payload = json_encode($data);
        $response->getBody()->write($payload);
        return $response->withHeader('Content-Type', 'application/json');
    });
    */
};

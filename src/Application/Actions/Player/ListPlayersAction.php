<?php

declare(strict_types=1);

namespace App\Application\Actions\Player;

use Psr\Http\Message\ResponseInterface as Response;

class ListPlayersAction extends PlayerAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $players = $this->playerRepository->findAll();

        $this->logger->info("Players list was viewed.");

        return $this->respondWithData($players);
    }
}

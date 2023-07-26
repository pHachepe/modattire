<?php

declare(strict_types=1);

namespace App\Application\Actions\Player;

use Psr\Http\Message\ResponseInterface as Response;

class DeletePlayerAction extends PlayerAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $id = (int) $this->resolveArg('id');

        $this->playerRepository->deleteById($id);

        $this->logger->info("Player with ID `${id}` was deleted.");

        return $this->respondWithData(null, 204);
    }
}

<?php

declare(strict_types=1);

namespace App\Application\Actions\Player;

use Psr\Http\Message\ResponseInterface as Response;

class ViewPlayerAction extends PlayerAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $id = (int) $this->resolveArg('id');

        $player = $this->playerRepository->findPlayerById($id);

        $this->logger->info("Player with ID `${id}` was viewed.");

        return $this->respondWithData($player);
    }
}

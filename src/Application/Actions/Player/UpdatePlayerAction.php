<?php

declare(strict_types=1);

namespace App\Application\Actions\Player;

use Psr\Http\Message\ResponseInterface as Response;

class UpdatePlayerAction extends PlayerAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $id = (int) $this->resolveArg('id');
        $playerData = $this->request->getParsedBody();

        $player = $this->playerRepository->findPlayerById($id);
        $player->fill($playerData);

        $this->playerRepository->save($player);

        $this->logger->info("Player with ID `${id}` was updated.");

        return $this->respondWithData($player);
    }
}

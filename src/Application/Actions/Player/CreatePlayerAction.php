<?php

declare(strict_types=1);

namespace App\Application\Actions\Player;

use Psr\Http\Message\ResponseInterface as Response;
use App\Domain\Player\Player;

class CreatePlayerAction extends PlayerAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $playerData = $this->request->getParsedBody();
        // validate player data before creating the player, optionally
        $this->validatePlayerData($playerData);

        $player = new Player();
        $player->fill($playerData);

        $this->playerRepository->save($player);

        $this->logger->info("A new player was created.");

        return $this->respondWithData($player);
    }

    /**
     * Validate the player data.
     * Throw an exception if the data is invalid.
     *
     * @param array $playerData
     */
    private function validatePlayerData(array $playerData): void
    {
        // mostrar mensaje por consola
        echo "Validating player data...\n";
        // TODO: Implement validation logic.
        // Throw an exception if the data is invalid.
    }
}

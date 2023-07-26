<?php

declare(strict_types=1);

namespace App\Domain\Player;

interface PlayerRepository
{
    /**
     * @return Player[]
     */
    public function findAll(): array;

    /**
     * @param int $id
     * @return Player
     * @throws PlayerNotFoundException
     */
    public function findPlayerById(int $id): Player;

    /**
     * @param Player $player
     */
    public function save(Player $player): void;

    /**
     * @param int $id
     * @throws PlayerNotFoundException
     */
    public function deleteById(int $id): void;
}

<?php

namespace App\Infrastructure\Persistence\Player;

use App\Domain\Player\Player;
use App\Domain\Player\PlayerNotFoundException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Domain\Player\PlayerRepository;

class EloquentPlayerRepository implements PlayerRepository
{
    /**
     * @return Player[]
     */
    public function findAll(): array
    {
        return Player::all()->toArray();
    }

    /**
     * @param int $id
     * @return Player
     * @throws PlayerNotFoundException
     */
    public function findPlayerById(int $id): Player
    {
        $player = Player::query()
            ->where('id', $id)
            ->first();
        
        if (!$player) {
            throw new PlayerNotFoundException($id);
        }
        
        return $player;
    }

    /**
     * @param Player $player
     */
    public function save(Player $player): void
    {
        $player->save();
    }

    /**
     * @param int $id
     * @throws PlayerNotFoundException
     */
    public function deleteById(int $id): void
    {
        try {
            // comprueba existe llamando a la función findPlayerById
            $player = $this->findPlayerById($id);
            // borra player
            $player->delete();
            //Player::destroy($id);
        } catch (\Exception $e) {
            throw new PlayerNotFoundException($id);
        }
    }
}

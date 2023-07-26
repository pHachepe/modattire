<?php

namespace App\Infrastructure\Persistence\Player;

use App\Domain\Player\Player;
use App\Domain\Player\PlayerRepository;
use App\Domain\Player\PlayerNotFoundException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
        try {
            return Player::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new PlayerNotFoundException($id);
        }
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
            // comprueba existe
            $player = Player::findOrFail($id);
            // borra player
            $player->delete();
            //Player::destroy($id);
        } catch (\Exception $e) {
            throw new PlayerNotFoundException($id);
        }
    }
}

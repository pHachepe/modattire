<?php

declare(strict_types=1);

namespace App\Application\Actions\Player;

use Psr\Log\LoggerInterface;
use App\Application\Actions\Action;
use App\Domain\Player\PlayerRepository;

abstract class PlayerAction extends Action
{
    protected PlayerRepository $playerRepository;

    public function __construct(LoggerInterface $logger, PlayerRepository $playerRepository)
    {
        parent::__construct($logger);
        $this->playerRepository = $playerRepository;
    }
}

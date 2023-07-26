<?php

declare(strict_types=1);

namespace App\Domain\Player;

use App\Domain\DomainException\DomainRecordNotFoundException;

class PlayerNotFoundException extends DomainRecordNotFoundException
{
    public function __construct($id = null)
    {
        parent::__construct("El jugador con id {$id} no existe.");
    }
}

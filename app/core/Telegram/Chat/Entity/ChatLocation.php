<?php

declare(strict_types=1);

namespace Core\Telegram\Chat\Entity;

use Core\Telegram\Location\Entity\Location;

class ChatLocation implements ChatLocationInterface
{
    /**
     * @param Location $location
     * @param ChatLocation\Address $address
     */
    public function __construct(
        public readonly Location             $location,
        public readonly ChatLocation\Address $address
    )
    {
    }
}

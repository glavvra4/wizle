<?php

declare(strict_types=1);

namespace Core\Telegram\Chat\Entity;

use Core\Telegram\Location\Entity\Location;

readonly class ChatLocation implements ChatLocationInterface
{
    /**
     * @param Location $location
     * @param ChatLocation\Address $address
     */
    public function __construct(
        public Location             $location,
        public ChatLocation\Address $address
    )
    {
    }
}

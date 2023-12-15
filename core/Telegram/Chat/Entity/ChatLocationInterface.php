<?php

declare(strict_types=1);

namespace Core\Telegram\Chat\Entity;

use Core\Telegram\Location\Entity\LocationInterface;

interface ChatLocationInterface
{
    /**
     * @return LocationInterface
     */
    public function getLocation(): LocationInterface;

    /**
     * @return ChatLocation\Address
     */
    public function getAddress(): ChatLocation\Address;
}

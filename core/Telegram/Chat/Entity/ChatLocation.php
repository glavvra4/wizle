<?php

declare(strict_types=1);

namespace Core\Telegram\Chat\Entity;

use Core\Telegram\Location\Entity\LocationInterface;

class ChatLocation implements ChatLocationInterface
{
    /**
     * @param LocationInterface $location
     * @param ChatLocation\Address $address
     */
    public function __construct(
        protected LocationInterface $location,
        protected ChatLocation\Address $address
    )
    {
    }

    /**
     * @return LocationInterface
     */
    public function getLocation(): LocationInterface
    {
        return $this->location;
    }

    /**
     * @return ChatLocation\Address
     */
    public function getAddress(): ChatLocation\Address
    {
        return $this->address;
    }
}

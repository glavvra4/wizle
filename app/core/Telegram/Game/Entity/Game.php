<?php

declare(strict_types=1);

namespace Core\Telegram\Game\Entity;

use Core\Telegram\File\Entity\{
    Animation,
    PhotoSizes
};
use Core\Telegram\Message\Entity\MessageEntities;

/** This object represents a game. Use BotFather to create and edit games, their short names will act as unique identifiers. */
class Game implements GameInterface
{
    /**
     * @param Game\Title $title
     * @param Game\Description $description
     * @param PhotoSizes $photo
     * @param Game\Text $text
     * @param MessageEntities $textEntities
     * @param Animation $animation
     */
    public function __construct(
        public readonly Game\Title $title,
        public readonly Game\Description $description,
        public readonly PhotoSizes $photo,
        public readonly Game\Text $text,
        public readonly MessageEntities $textEntities,
        public readonly Animation $animation
    )
    {
    }
}

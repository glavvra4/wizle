<?php

declare(strict_types=1);

namespace Core\Telegram\Game\Entity;

use Core\Telegram\File\Entity\{
    Animation,
    PhotoSizes
};
use Core\Telegram\Message\Entity\MessageEntities;

/** This object represents a game. Use BotFather to create and edit games, their short names will act as unique identifiers. */
readonly class Game implements GameInterface
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
        public Game\Title $title,
        public Game\Description $description,
        public PhotoSizes $photo,
        public Game\Text $text,
        public MessageEntities $textEntities,
        public Animation $animation
    )
    {
    }
}

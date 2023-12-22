<?php

declare(strict_types=1);

namespace Core\Telegram\Update\Entity;

use Core\Telegram\Message\Entity\Message;
use Core\Telegram\Update\Entity\Update\Id;

/** This object represents an incoming update. At most one of the optional parameters can be present in any given update. */
class Update implements UpdateInterface
{
    /**
     * @param Id $id
     * @param Message|null $message
     * @param Message|null $editedMessage
     * @param Message|null $channelPost
     * @param Message|null $editedChannelPost
     */
    public function __construct(
        public readonly Update\Id         $id,
        public readonly ?Message $message = null,
        public readonly ?Message $editedMessage = null,
        public readonly ?Message $channelPost = null,
        public readonly ?Message $editedChannelPost = null,
    )
    {
    }
}

<?php

declare(strict_types=1);

namespace Core\Telegram\Message\Entity;

use Core\Telegram\Chat\Entity\Chat;
use Core\Telegram\Chat\Entity\ForumTopic;
use Core\Telegram\Message\Entity\Message\Date;
use Core\Telegram\Message\Entity\Message\Id;
use Core\Telegram\User\Entity\UserInterface;

readonly class Message implements MessageInterface
{
    /**
     * @param Id $id
     * @param Date $date
     * @param Chat $chat
     * @param ForumTopic\Id|null $threadId
     * @param UserInterface|null $from
     * @param Chat|null $senderChat
     * @param UserInterface|null $forwardFrom
     * @param Chat|null $forwardFromChat
     */
    public function __construct(
        public Message\Id     $id,
        public Message\Date   $date,
        public Chat           $chat,
        public ?ForumTopic\Id $threadId = null,
        public ?UserInterface $from = null,
        public ?Chat          $senderChat = null,
        public ?UserInterface $forwardFrom = null,
        public ?Chat          $forwardFromChat = null
    )
    {
    }
}

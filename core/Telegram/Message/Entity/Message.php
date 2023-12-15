<?php

declare(strict_types=1);

namespace Core\Telegram\Message\Entity;

use Core\Telegram\Chat\Entity\ChatInterface;
use Core\Telegram\Chat\Entity\ForumTopic;
use Core\Telegram\Message\Entity\Message\Date;
use Core\Telegram\Message\Entity\Message\Id;
use Core\Telegram\User\Entity\UserInterface;

class Message implements MessageInterface
{
    /**
     * @param Id $id
     * @param Date $date
     * @param ChatInterface $chat
     * @param ForumTopic\Id|null $threadId
     * @param UserInterface|null $from
     * @param ChatInterface|null $senderChat
     * @param UserInterface|null $forwardFrom
     * @param ChatInterface|null $forwardFromChat
     */
    public function __construct(
        protected Message\Id $id,
        protected Message\Date $date,
        protected ChatInterface $chat,
        protected ?ForumTopic\Id $threadId = null,
        protected ?UserInterface $from = null,
        protected ?ChatInterface $senderChat = null,
        protected ?UserInterface $forwardFrom = null,
        protected ?ChatInterface $forwardFromChat = null
    )
    {
    }

    /**
     * @return Message\Id
     */
    public function getId(): Message\Id
    {
        return $this->id;
    }

    /**
     * @return Message\Date
     */
    public function getDate(): Message\Date
    {
        return $this->date;
    }

    /**
     * @return ChatInterface
     */
    public function getChat(): ChatInterface
    {
        return $this->chat;
    }
}

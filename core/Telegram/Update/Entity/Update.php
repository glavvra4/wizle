<?php

declare(strict_types=1);

namespace Core\Telegram\Update\Entity;

use Core\Telegram\Message\Entity\MessageInterface;
use Core\Telegram\Update\Entity\Update\Id;

/** This object represents an incoming update. At most one of the optional parameters can be present in any given update. */
readonly class Update implements UpdateInterface
{
    /**
     * @param Id $id
     * @param MessageInterface|null $message
     * @param MessageInterface|null $editedMessage
     * @param MessageInterface|null $channelPost
     * @param MessageInterface|null $editedChannelPost
     */
    public function __construct(
        public Update\Id         $id,
        public ?MessageInterface $message = null,
        public ?MessageInterface $editedMessage = null,
        public ?MessageInterface $channelPost = null,
        public ?MessageInterface $editedChannelPost = null,
    )
    {
    }

    /**
     * @return Update\Id
     */
    public function getId(): Update\Id
    {
        return $this->id;
    }

    /**
     * @return MessageInterface|null
     */
    public function getMessage(): ?MessageInterface
    {
        return $this->message;
    }

    /**
     * @return MessageInterface|null
     */
    public function getEditedMessage(): ?MessageInterface
    {
        return $this->editedMessage;
    }

    /**
     * @return MessageInterface|null
     */
    public function getChannelPost(): ?MessageInterface
    {
        return $this->channelPost;
    }

    /**
     * @return MessageInterface|null
     */
    public function getEditedChannelPost(): ?MessageInterface
    {
        return $this->editedChannelPost;
    }
}

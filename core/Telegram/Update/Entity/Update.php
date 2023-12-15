<?php

declare(strict_types=1);

namespace Core\Telegram\Update\Entity;

use Core\Telegram\Message\Entity\MessageInterface;
use Core\Telegram\Update\Entity\Update\Id;

/** This object represents an incoming update. At most one of the optional parameters can be present in any given update. */
class Update implements UpdateInterface
{
    /**
     * @param Id $id
     * @param MessageInterface|null $message
     * @param MessageInterface|null $editedMessage
     * @param MessageInterface|null $channelPost
     * @param MessageInterface|null $editedChannelPost
     */
    public function __construct(
        protected Update\Id $id,
        protected ?MessageInterface $message = null,
        protected ?MessageInterface $editedMessage = null,
        protected ?MessageInterface $channelPost = null,
        protected ?MessageInterface $editedChannelPost = null,
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

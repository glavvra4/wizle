<?php

declare(strict_types=1);

namespace Core\Telegram\Update\Entity;

use Core\Telegram\Message\Entity\MessageInterface;

interface UpdateInterface
{
    public function getId(): Update\Id;
    public function getMessage(): ?MessageInterface;
    public function getEditedMessage(): ?MessageInterface;
    public function getChannelPost(): ?MessageInterface;
    public function getEditedChannelPost(): ?MessageInterface;
}

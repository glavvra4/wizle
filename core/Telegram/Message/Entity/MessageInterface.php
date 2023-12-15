<?php

declare(strict_types=1);

namespace Core\Telegram\Message\Entity;

use Core\Telegram\Chat\Entity\ChatInterface;

interface MessageInterface
{
    public function getId(): Message\Id;
    public function getDate(): Message\Date;
    public function getChat(): ChatInterface;
}

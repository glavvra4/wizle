<?php

declare(strict_types=1);

namespace App\EventListener\Telegram\Message;

use App\Event\Telegram\MessageEvent;

abstract class AbstractMessageListener
{
    abstract public function onMessage(MessageEvent $event): void;
}
